<?php

namespace App\Http\Controllers;

use App\Account;
use App\Attendee;
use App\Event;
use App\Events\OrderCompletedEvent;
use App\Models\AccountPaymentGateway;
use App\Models\Affiliate;
use App\Models\EventStats;
use App\Order;
use App\Models\OrderItem;
use App\Models\QuestionAnswer;
use App\Models\ReservedTickets;
use App\Models\Ticket;
use App\Services\Order as OrderService;
use Auth;
use Carbon\Carbon;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Log;
use Omnipay;
use PDF;
use PhpSpec\Exception\Exception;
use Validator;

class EventCheckoutController extends Controller
{
    /**
     * Is the checkout in an embedded Iframe?
     *
     * @var bool
     */
    protected $is_embedded;

    /**
     * EventCheckoutController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        /*
         * See if the checkout is being called from an embedded iframe.
         */
        $this->is_embedded = $request->get('is_embedded') == '1';
    }

    /**
     * Validate a ticket request. If successful reserve the tickets and redirect to checkout
     *
     * @param Request $request
     * @param $event_id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function postValidateTickets(Request $request, $event_id)
    {
        /*
         * Order expires after X min
         */
        $order_expires_time = Carbon::now()->addMinutes(config('attendize.checkout_timeout_after'));

        $event = Event::findOrFail($event_id);
        if (!$request->has('tickets')) {
            return response()->json([
                'status' => 'error',
                'message' => 'No tickets selected',
            ]);
        }

        $ticket_ids = $request->get('tickets');

        /*
         * Remove any tickets the user has reserved
         */
        ReservedTickets::where('session_id', '=', session()->getId())->delete();

        /*
         * Go though the selected tickets and check if they're available
         * , tot up the price and reserve them to prevent over selling.
         */

        $validation_rules = [];
        $validation_messages = [];
        $tickets = [];
        $order_total = 0;
        $total_ticket_quantity = 0;
        $booking_fee = 0;
        $organiser_booking_fee = 0;
        $quantity_available_validation_rules = [];

        foreach ($ticket_ids as $ticket_id) {
            $current_ticket_quantity = (int) $request->get('ticket_' . $ticket_id);

            if ($current_ticket_quantity < 1) {
                continue;
            }

            $total_ticket_quantity = $total_ticket_quantity + $current_ticket_quantity;
            $ticket = Ticket::find($ticket_id);
            $ticket_quantity_remaining = $ticket->max_per_person;
            $max_per_person = min($ticket_quantity_remaining, $ticket->max_per_person);

            $quantity_available_validation_rules['ticket_' . $ticket_id] = [
                'numeric',
                'min:' . $ticket->min_per_person,
                'max:' . $ticket->$max_per_person,
            ];

            $quantity_available_validation_messages = [
                'ticket_' . $ticket_id . '.max' => 'The maximum number of tickets you can register is ' . $ticket_quantity_remaining,
                'ticket_' . $ticket_id . '.min' => 'You must select at least ' . $ticket->min_per_person . ' tickets.',
            ];

            $validator = Validator::make(['ticket_' . $ticket_id => (int) $request->get('ticket_' . $ticket_id)],
                $quantity_available_validation_rules, $quantity_available_validation_messages);

            $order_total = $order_total + ($current_ticket_quantity * $ticket->price);
            $booking_fee = $booking_fee + ($current_ticket_quantity * $ticket->booking_fee);
            $organiser_booking_fee = $organiser_booking_fee + ($current_ticket_quantity * $ticket->organiser_booking_fee);

            $tickets[] = [
                'ticket' => $ticket,
                'qty' => $current_ticket_quantity,
                'price' => ($current_ticket_quantity * $ticket->price),
                'booking_fee' => ($current_ticket_quantity * $ticket->booking_fee),
                'organiser_booking_fee' => ($current_ticket_quantity * $ticket->organiser_booking_fee),
                'full_price' => $ticket->price + $ticket->total_booking_fee,
            ];

            /*
             * Reserve the tickets for X amount of minutes
             */
            $reservedTickets = new ReservedTickets();
            $reservedTickets->ticket_id = $ticket_id;
            $reservedTickets->event_id = $event_id;
            $reservedTickets->quantity_reserved = $current_ticket_quantity;
            $reservedTickets->expires = $order_expires_time;
            $reservedTickets->session_id = session()->getId();
            $reservedTickets->save();

        }
        if (empty($tickets)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No tickets selected.',
            ]);
        }

        if (config('attendize.enable_dummy_payment_gateway') == true) {
            $activeAccountPaymentGateway = new AccountPaymentGateway();
            $activeAccountPaymentGateway->fill(['payment_gateway_id' => config('attendize.payment_gateway_dummy')]);
            $paymentGateway = $activeAccountPaymentGateway;
        } else {
            $eventAccount = $event->account;
            $activeAccountPaymentGateway = $eventAccount->active_payment_gateway;
            //$activeAccountPaymentGateway = ($eventPaymentGateway->count()) ? $eventPaymentGateway->firstOrFail() : false;
            $paymentGateway = $activeAccountPaymentGateway->count() ? $activeAccountPaymentGateway->payment_gateway : false;
        }

        /*
         * The 'ticket_order_{event_id}' session stores everything we need to complete the transaction.
         */
        $temporal_id = "ticket_order_" . time();
        //Generamos un cahce donde contiene la información primordial del pago, antes de introducir datos del usuario
        //Que va a cancelar
        Cache::put($temporal_id, [
            'validation_rules' => $validation_rules,
            'validation_messages' => $validation_messages,
            'event_id' => $event->id,
            'tickets' => $tickets,
            'total_ticket_quantity' => $total_ticket_quantity,
            'order_started' => time(),
            'expires' => $order_expires_time,
            'reserved_tickets_id' => $reservedTickets->id,
            'order_total' => $order_total,
            'booking_fee' => $booking_fee,
            'organiser_booking_fee' => $organiser_booking_fee,
            'total_booking_fee' => $booking_fee + $organiser_booking_fee,
            'order_requires_payment' => (ceil($order_total) == 0) ? false : true,
            'account_id' => $event->account->id,
            'affiliate_referral' => Cookie::get('affiliate_' . $event_id),
            'account_payment_gateway' => $activeAccountPaymentGateway,
            'payment_gateway' => $paymentGateway,
        ], config('attendize.minutes_cache_tickets'));
        /*
         * If we're this far assume everything is OK and redirect them
         * to the the checkout page.
         */
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'redirectUrl' => route('showEventCheckout', [
                    'event_id' => $temporal_id,
                    'is_embedded' => $this->is_embedded,
                ]) . '#order_form',
            ]);
        }
        /*
         * Maybe display something prettier than this?
         */
        exit('Please enable Javascript in your browser.');
    }

    /**
     * Show the checkout page
     *
     * @param Request $request
     * @param $event_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showEventCheckout(Request $request, $temporal_id)
    {
        $order_session = Cache::get($temporal_id);

        if (!$order_session || $order_session['expires'] < Carbon::now()) {

            $route_name = $this->is_embedded ? 'showEmbeddedEventPage' : 'showEventPage';
            return redirect()->route($route_name, ['event_id' => $order_session['event_id']]);
            return $order_session;
        }

        $secondsToExpire = Carbon::now()->diffInSeconds($order_session['expires']);

        $event = Event::findorFail($order_session['event_id']);

        //Find user fields in event.
        $fields = $event->user_properties;

        $orderService = new OrderService($order_session['order_total'], $order_session['total_booking_fee'], $event);
        $orderService->calculateFinalCosts();

        $data = $order_session + [
            'event' => $event,
            'secondsToExpire' => $secondsToExpire,
            'is_embedded' => $this->is_embedded,
            'orderService' => $orderService,
            'fields' => $fields,
            'temporal_id' => $temporal_id,
        ];

        if ($this->is_embedded) {
            return view('Public.ViewEvent.Embedded.EventPageCheckout', $data);
        }

        return view('Public.ViewEvent.EventPageCheckout', $data);
    }

    /**
     * Create the order, handle payment, update stats, fire off email jobs then redirect user
     *
     * @param Request $request
     * @param $event_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCreateOrder(Request $request, $temporal_id)
    {
        //Capturamos el ticket del cache en ticket_order, recuerda que eesto es solo cache
        $ticket_order = Cache::get($temporal_id);
        //Extraemos el event_id del cache
        $event_id = $ticket_order["event_id"];
        
        //If there's no session kill the request and redirect back to the event homepage.
        //Si no estan los terminos y condiciones , no continua.
        if (!$request->has('terms')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Por favor aceptar los términos y condiciones',
            ]);
        }

        //Buscamos el evento por medio del event_id
        $event = Event::findOrFail($event_id);

        //Capturamos los datos ingresados por el usuario y la guardamos en el cache como request_data
        $ticket_order['request_data'] = $request->except(['card-number', 'card-cvc']);
        Cache::put($temporal_id, $ticket_order, config('attendize.minutes_cache_tickets'));

        //START No entiendo que hace acá esto
        $orderRequiresPayment = $ticket_order['order_requires_payment'];
        
        if ($orderRequiresPayment && $request->get('pay_offline') && $event->enable_offline_payments) {
            return $this->completeOrder($event_id);
        }

        if (!$orderRequiresPayment) {
            return $this->completeOrder($event_id);
        }
        //END No entiendo que hace acá esto

        try {
            //more transation data being put in here.
            $transaction_data = [];
            if (config('attendize.enable_dummy_payment_gateway') == true) {
                $formData = config('attendize.fake_card_data');
                $transaction_data = [
                    'card' => $formData,
                ];
                $gateway = Omnipay::create('Dummy');
                $gateway->initialize();

            } else {
                $gateway = Omnipay::create($ticket_order['payment_gateway']->name);
                $config = $ticket_order['account_payment_gateway']->config;
                if (!$config) {
                    $config = [];
                }

                $config += [
                    'testMode' => config('attendize.enable_test_payments'),
                    'login' => 'f7186b9a9bd5f04ab68233cd33c31044',
                    'tranKey' => '3ZNdDTNP0Uk1A28G',
                    'url' => 'https://test.placetopay.com/redirection/',
                ];

                $gateway->initialize($config);
            }

            $orderService = new OrderService($ticket_order['order_total'], $ticket_order['total_booking_fee'], $event);
            $orderService->calculateFinalCosts();

            $transaction_data += [
                'amount' => $orderService->getGrandTotal(),
                'currency' => $event->currency->code,
                'description' => 'Evento: ' . $event->name,
            ];

            //TODO: class with an interface that builds the transaction data.
            switch ($ticket_order['payment_gateway']->id) {
                case config('attendize.payment_gateway_dummy'):
                    $token = uniqid();
                    $transaction_data += [
                        'token' => $token,
                        'receipt_email' => $request->get('order_email'),
                        'card' => $formData,
                    ];
                    break;
                case config('attendize.payment_gateway_paypal'):

                    $transaction_data += [
                        'cancelUrl' => route('showEventCheckoutPaymentReturn', [
                            'event_id' => $event_id,
                            'is_payment_cancelled' => 1,
                        ]),
                        'returnUrl' => route('showEventCheckoutPaymentReturn', [
                            'event_id' => $event_id,
                            'is_payment_successful' => 1,
                        ]),
                        'brandName' => isset($ticket_order['account_payment_gateway']->config['brandingName'])
                        ? $ticket_order['account_payment_gateway']->config['brandingName']
                        : $event->organiser->name,
                    ];
                    break;
                case config('attendize.payment_gateway_stripe'):
                    $token = $request->get('stripeToken');
                    $transaction_data += [
                        'token' => $token,
                        'receipt_email' => $request->get('order_email'),
                    ];
                    break;
                //CONFIGURATION PLACETOPAY
                case config('attendize.payment_gateway_placetopay'):
                    $transaction_data += [
                        'returnUrl' => 'https://api.evius.co/order/' . $temporal_id . '/payment',
                        'orderid' => $temporal_id,
                        'login' => 'f7186b9a9bd5f04ab68233cd33c31044',
                        'tranKey' => '3ZNdDTNP0Uk1A28G',
                        'url' => 'https://test.placetopay.com/redirection/',
                        'typeDocument' => $request->get('typeDocument'),
                        'document' => $request->get('document'),
                        'username' => $request->get('order_first_name'),
                        'lastname' => $request->get('order_last_name'),
                        'payerIsBuyer' => $request->get('payerIsBuyer'),
                        'mobile' => $request->get('mobile'),
                        'email' => Auth::user()->email,
                        'cancelUrl' => 'https://api.evius.co/order/' . $temporal_id . '/payment',
                    ];

                    break;

                default:
                    Log::error('No payment gateway configured.');
                    return repsonse()->json([
                        'status' => 'error',
                        'message' => 'No payment gateway configured.',
                    ]);
                    break;
            }

            $transaction = $gateway->purchase($transaction_data);
            $response = $transaction->send();

            if ($response->isSuccessful()) {

                session()->push('ticket_order_' . $event_id . '.transaction_id', $response->getTransactionReference());
                return $this->completeOrder($event_id);

            } elseif ($response->isRedirect() && $response->response->processUrl) {

                /*
                 * As we're going off-site for payment we need to store some data in a session so it's available
                 * when we return
                 */

                // $response->requestId() and $response->processUrl()
                $session_id = $response->getTransactionReference();
                $url_redirect = $response->response->processUrl;

                $ticket_order['transaction_data'] = $transaction_data;
                $ticket_order['transaction_data'] += ['session_id' => $session_id];
                $ticket_order['transaction_data'] += ['url_redirect' => $url_redirect];
                //Guardamos la informacion del tickete en el cache y vamos a complete order para generar la orden.
                Cache::put($temporal_id, $ticket_order, config('attendize.minutes_cache_tickets'));
                $this->storeOrder($temporal_id);
                

                Log::info("Redirect url: " . $response->getRedirectUrl());

                $return = [
                    'status' => 'success',
                    'redirectUrl' => $response->getRedirectUrl(),
                    'message' => 'Redirecting to ' . $ticket_order['payment_gateway']->provider_name,
                ];

                // GET method requests should not have redirectData on the JSON return string
                if ($response->getRedirectMethod() == 'POST') {
                    $return['redirectData'] = $response->getRedirectData();
                }

                return response()->json($return);

            } else {
                // display error to customer
                return response()->json([
                    'status' => 'error',
                    'message' => 'Verifíca los datos para poder continuar',
                ]);
            }
        } catch (\Exeption $e) {
            Log::error($e);
            $error = 'Sorry, there was an error processing your payment. Please try again.';
        }
        if ($error) {
            return response()->json([
                'status' => 'error',
                'message' => $error,
            ]);
        }

    }

    public function placetopay()
    {
        return $request;
    }

    /**
     * Attempt to complete a user's payment when they return from
     * an off-site gateway
     *
     * @param Request $request
     * @param $event_id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function showEventCheckoutPaymentReturn(Request $request, $event_id)
    {
        if ($request->get('is_payment_cancelled') == '1') {
            session()->flash('message', 'You cancelled your payment. You may try again.');
            return response()->redirectToRoute('showEventCheckout', [
                'event_id' => $event_id,
                'is_payment_cancelled' => 1,
            ]);
        }

        $ticket_order = session()->get('ticket_order_' . $event_id);
        $gateway = Omnipay::create($ticket_order['payment_gateway']->name);

        $gateway->initialize($ticket_order['account_payment_gateway']->config + [
            'testMode' => config('attendize.enable_test_payments'),
        ]);

        $transaction = $gateway->completePurchase($ticket_order['transaction_data'][0]);

        $response = $transaction->send();

        if ($response->isSuccessful()) {
            session()->push('ticket_order_' . $event_id . '.transaction_id', $response->getTransactionReference());
            return $this->completeOrder($event_id, false);
        } else {
            session()->flash('message', $response->getMessage());
            return response()->redirectToRoute('showEventCheckout', [
                'event_id' => $event_id,
                'is_payment_failed' => 1,
            ]);
        }

    }

    /**
     * Complete an order
     *
     * @param $event_id
     * @param bool|true $return_json
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function completeOrder($temporal_id, $return_json = true)
    {
        //Si la orden ya fue creada entonces redirigimos al recibo con los ticketes, si no 
        //vamos a crear la orden a partir del cache.
        //EL CACHE ES INDISPENSABLE EN ESTE CONTROLADOR

            try {

                $order = Order::where('order_reference', '=', $temporal_id)->first();
                $ticket_order = Cache::get($temporal_id);
                $transaction_data = $ticket_order['transaction_data'];

                $event_id = $ticket_order['event_id'];
                $request_data = $ticket_order['request_data'];

                //Buscamos el evento el cual le pertence el ticket
                $event = Event::findOrFail($ticket_order['event_id']);
                $orderService = new OrderService($ticket_order['order_total'], $ticket_order['total_booking_fee'], $event);
                $orderService->calculateFinalCosts();
                $fields = $event->user_properties;
                $attendee_increment = 1;
                $ticket_questions = isset($request_data['ticket_holder_questions']) ? $request_data['ticket_holder_questions'] : [];
                //Creamos la nueva orden
            
                /*
                 * Update the event sales volume
                 */
                $event->increment('sales_volume', (int) $orderService->getGrandTotal());
                $event->increment('organiser_fees_volume', (int) $order->organiser_booking_fee);

                /*
                 * Update affiliates stats stats
                 */
                if ($ticket_order['affiliate_referral']) {
                    $affiliate = Affiliate::where('name', '=', $ticket_order['affiliate_referral'])
                        ->where('event_id', '=', $event_id)->first();
                    $affiliate->increment('sales_volume', $order->amount + $order->organiser_booking_fee);
                    $affiliate->increment('tickets_sold', $ticket_order['total_ticket_quantity']);
                }

                /*
                 * Update the event stats
                 */
                $event_stats = EventStats::updateOrCreate([
                    'event_id' => $event_id,
                    'date' => (Carbon::now())->toDateString(),
                ]);

                $event_stats->increment('tickets_sold', $ticket_order['total_ticket_quantity']);
                if ($ticket_order['order_requires_payment']) {
                    $event_stats->increment('sales_volume', $order->amount);
                    $event_stats->increment('organiser_fees_volume', $order->organiser_booking_fee);
                }
                /*
                 * Add the attendees
                 */
                foreach ($ticket_order['tickets'] as $attendee_details) {

                    /*
                     * Update ticket's quantity sold
                     */
                    $ticket = Ticket::findOrFail($attendee_details['ticket']['id']);

                    /*
                     * Update some ticket info
                     */
                    $ticket->increment('quantity_sold', $attendee_details['qty']);
                    $ticket->increment('sales_volume', ($attendee_details['ticket']['price'] * $attendee_details['qty']));
                    $ticket->increment('organiser_fees_volume',
                        ($attendee_details['ticket']['organiser_booking_fee'] * $attendee_details['qty']));

                    /*
                     * Insert order items (for use in generating invoices)
                     */
                    $orderItem = new OrderItem();
                    $orderItem->title = $attendee_details['ticket']['title'];
                    $orderItem->quantity = $attendee_details['qty'];
                    $orderItem->order_id = $order->id;
                    $orderItem->unit_price = $attendee_details['ticket']['price'];
                    $orderItem->unit_booking_fee = $attendee_details['ticket']['booking_fee'] + $attendee_details['ticket']['organiser_booking_fee'];
                    $orderItem->save();

                    /*
                     * Create the attendees
                     */
                    for ($i = 0; $i < $attendee_details['qty']; $i++) {

                        $attendee = new Attendee();
                        $attendee->properties = (object) [];

                        foreach ($fields as $field) {
                            if (!$field['name']) {
                                continue;
                            }

                            $attendee->properties->{$field['name']} = $request_data["tiket_holder_" . str_replace(" ", "_", $field['name'])][$i][$attendee_details['ticket']['id']];
                        }
                        $attendee->event_id = $event_id;
                        $attendee->order_id = $order->id;
                        $attendee->ticket_id = $attendee_details['ticket']['id'];
                        $attendee->account_id = $event->account->id;
                        $attendee->reference_index = $attendee_increment;
                        $attendee->save();

                        /*
                         * Save the attendee's questions
                         */
                        foreach ($attendee_details['ticket']->questions as $question) {

                            $ticket_answer = isset($ticket_questions[$attendee_details['ticket']->id][$i][$question->id]) ? $ticket_questions[$attendee_details['ticket']->id][$i][$question->id] : null;

                            if (is_null($ticket_answer)) {
                                continue;
                            }

                            /*
                             * If there are multiple answers to a question then join them with a comma
                             * and treat them as a single answer.
                             */
                            $ticket_answer = is_array($ticket_answer) ? implode(', ', $ticket_answer) : $ticket_answer;

                            if (!empty($ticket_answer)) {
                                QuestionAnswer::create([
                                    'answer_text' => $ticket_answer,
                                    'attendee_id' => $attendee->id,
                                    'event_id' => $event->id,
                                    'account_id' => $event->account->id,
                                    'question_id' => $question->id,
                                ]);

                            }
                        }

                        /* Keep track of total number of attendees */
                        $attendee_increment++;
                    }
                }

            } catch (Exception $e) {

                Log::error($e);
                // DB::rollBack();

                return response()->json([
                    'status' => 'error',
                    'message' => 'Whoops! There was a problem processing your order. Please try again.',
                ]);

            }
            // Queue up some tasks - Emails to be sent, PDFs etc.
            Log::info('Firing the event');
            event(new OrderCompletedEvent($order));
            /* Envío de correo */
            // $this->dispatch(new SendOrderTickets($order));


        return response()->redirectToRoute('showOrderDetails', [
            'is_embedded' => $this->is_embedded,
            'order_reference' => $order->order_reference,
        ]);

    }

    /**
     * Show the order details page
     *
     * @param Request $request
     * @param $order_reference
     * @return \Illuminate\View\View
     */
    public function showOrderDetails(Request $request, $order_reference)
    {
        $order = Order::where('order_reference', '=', $order_reference)->first();

        if (!$order) {
            abort(404);
        }

        $orderService = new OrderService($order->amount, $order->organiser_booking_fee, $order->event);
        $orderService->calculateFinalCosts();

        $data = [
            'order' => $order,
            'orderService' => $orderService,
            'event' => $order->event,
            'tickets' => $order->event->tickets,
            'is_embedded' => $this->is_embedded,
        ];

        if ($this->is_embedded) {
            return view('Public.ViewEvent.Embedded.EventPageViewOrder', $data);
        }

        return view('Public.ViewEvent.EventPageViewOrder', $data);
    }

    /**
     * Generate Order
     *
     * @param [type] $temporal_id
     * @return void
     */
    public function storeOrder($temporal_id){
        //Datos necesarios para la generación de la orden
        Log::info('Generación de la orden');
        $ticket_order = Cache::get($temporal_id);
        $transaction_data = $ticket_order['transaction_data'];
        $request_data = $ticket_order['request_data'];
        $event_id = $ticket_order['event_id'];
        $event = Event::findOrFail($ticket_order['event_id']);
        Log::info("creamo la orden: " . json_encode($ticket_order));
        //Datos necesarios para la generación de la orde
        $order = new Order($request_data);
        /*
         * Create the order
         */
        if (isset($ticket_order['transaction_id'])) {
            $order->transaction_id = $ticket_order['transaction_id'][0];
        }
        if ($ticket_order['order_requires_payment'] && !isset($request_data['pay_offline'])) {
            $order->payment_gateway_id = $ticket_order['payment_gateway']->id;
        }
        //Guardamos cada uno de los datos de la orden
        $order->first_name = strip_tags($request_data['order_first_name']);
        $order->last_name = strip_tags($request_data['order_last_name']);
        $order->email = $transaction_data['email'];
        $order->order_status_id = config('attendize.order_awaiting_payment');
        $order->amount = $ticket_order['order_total'];
        $order->booking_fee = $ticket_order['booking_fee'];
        $order->organiser_booking_fee = $ticket_order['organiser_booking_fee'];
        $order->discount = 0.00;
        $order->account_id = $event->account->id;
        $order->event_id = $ticket_order['event_id'];
        $order->is_payment_received = isset($request_data['pay_offline']) ? 0 : 1;
        $order->session_id = $ticket_order['transaction_data']['session_id'];
        $order->order_reference = $temporal_id;
        // Calculating grand total including tax
        $orderService = new OrderService($ticket_order['order_total'], $ticket_order['total_booking_fee'], $event);
        $orderService->calculateFinalCosts();
        $order->taxamt = $orderService->getTaxAmount();
        $order->url = $transaction_data['url_redirect'];
        $order->save();

        return $order;
    }
    /**
     * Shows the tickets for an order - either HTML or PDF
     *
     * @param Request $request
     * @param $order_reference
     * @return \Illuminate\View\View
     */
    public function showOrderTickets(Request $request, $order_reference)
    {
        $order = Order::where('order_reference', '=', $order_reference)->first();

        if (!$order) {
            abort(404);
        }
        $images = [];
        $imgs = $order->event->images;
        foreach ($imgs as $img) {
            $images[] = base64_encode(file_get_contents(public_path($img->image_path)));
        }

        $data = [
            'order' => $order,
            'event' => $order->event,
            'tickets' => $order->event->tickets,
            'attendees' => $order->attendees,
            //'css'       => "file_get_contents(public_path('assets/stylesheet/ticket.css'))",
            'css' => '',
            //'image'     => base64_encode(file_get_contents(public_path($order->event->organiser->full_logo_path))),
            'images' => $images,
        ];

        if ($request->get('download') == '1') {
            //  return PDF::html('Public.ViewEvent.Partials.PDFTicket', $data, 'Tickets');
            $pdf = PDF::loadView('Public.ViewEvent.Partials.PDFTicket', $data);
            return $pdf->download('Tickets-pdf');
        }
        return view('Public.ViewEvent.Partials.PDFTicket', $data);
    }

    /**
     * Process purshase status from placetopay via POST
     * (Rejected, accepted purshase)
     *
     * @param Request $request
     * @return void
     */
    public function paymentCompleted(Request $request)
    {
        Log::info("Petición retornado por PlaceToPay: ");
        $request = $request->json()->all();
	    $status = $request['status']['status'];
        $order_reference = $request['reference'];
        return $this->changeStatusOrder($order_reference, $status);
    }

    /**
     * Change Order Status
     * (Rejected, Approved, Pending, Cancelled)
     *
     * @param Request $request
     * @return void
     */
    public function changeStatusOrder($order_reference, $status){
        Log::info("Change Order: ".$order_reference.' Status: '.$status);
        $order = Order::where('order_reference', '=', $order_reference)->first();   
        switch ($status) {
            case 'APPROVED':
                //Enviamos un mensaje al usuario si este estaba en otro estado y va  a pasar a estado completado.
                //Ademas de guardar el nuevo estado
                if($order->order_status_id != config('attendize.order_complete')){
                    $order->order_status_id= config('attendize.order_complete');
                    Log::info("Completamos la orden");
                    $this->completeOrder($order_reference);
                    if(config('attendize.send_email')){
                        Log::info("Enviamos el correo");
                        $this->dispatch(new \App\Jobs\SendOrderTickets($order));
                    }
                }
                break;
            case 'REJECTED':
                $order->order_status_id= config('attendize.order_rejected');
                break;
            case 'PENDING':
                $order->order_status_id= config('attendize.order_pending');
                break;
            case 'CANCELLED':
                $order->order_status_id= config('attendize.order_cancelled');
                break;
            case 'FAILED':
                $order->order_status_id= config('attendize.order_failed');
                break;
        }
        $order->save();
        return $order;
    }

    /**
     * Process purshase status via GET
     * (Rejected, accepted purshase or pending)
     *
     * @param Request $request
     * @return void
     */
    public function completePayment(String $id)
    {
        $temporal_id = $id;
        $order = Order::where('order_reference', $temporal_id)->first();
        
        return response()->redirectToRoute('showOrderDetails', [
            'is_embedded' => $this->is_embedded,
            'order_reference' => $order->order_reference,
        ]);
    }

    /**
     * Show information about the order
     * (Rejected, accepted purshase or pending)
     *
     * @param Request $request
     * @return void
     */
    public function showOrderPaymentStatusDetails($order_reference)
    {
        $placetopay = new \Dnetix\Redirection\PlacetoPay([
            'login' => 'f7186b9a9bd5f04ab68233cd33c31044',
            'tranKey' => '3ZNdDTNP0Uk1A28G',
            'url' => 'https://test.placetopay.com/redirection/',
            'type' => \Dnetix\Redirection\PlacetoPay::TP_REST,
        ]);
        $order = Order::where('order_reference', '=', $order_reference)->first();
        $reference = $order_reference;
        $date = new \DateTime();
        $today = $date->format('d-m-Y');
        $order_total = $order->amount;
        $order_name = $order->first_name;
        $order_lastname = $order->last_name;
        $order_email = $order->email;

        //Respuesta de Placetopay del proceso de pago
        $response = $placetopay->query($order->session_id);
        
	$status =  $response->payment() ? $response->payment()[0]->status()->status(): 'CANCELLED';
	$request = $response->request();
        $payment = $response->payment() ? $request->payment() : '';
        $amount = $payment ? $payment->amount(): '0';
        $autorization = $response;
        $this->changeStatusOrder($order_reference, $status);

        return view('Public.ViewEvent.EventPageDetailOrder', compact('request', 'status', 'amount', 'order_total', 'order_name', 'order_lastname', 'order_email', 'today', 'reference', 'payment'));
    }
/* 
    public function borrarOrdenes(){
        $orders = ReservedTickets::all();
        foreach($orders as $order){
            $order->forcedelete();
        }
        return 'ok';
        // use App\Models\OrderItem;
        // use App\Models\QuestionAnswer;
        // use App\Models\ReservedTickets;
    } */
}
