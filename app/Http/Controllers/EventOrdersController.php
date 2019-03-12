<?php

namespace App\Http\Controllers;


use App\Jobs\SendOrderTickets;
use App\Attendee;
use App\Event;
use App\User;
use App\Models\EventStats;
use App\Order;
use App\evaLib\Services\Order as OrderService;
use DB;
use Excel;
use Illuminate\Http\Request;
use Log;
use Mail;
use Omnipay;
use Validator;
use Carbon\Carbon;

class EventOrdersController extends Controller
{

    /**
     * Show event orders page
     *
     * @param Request $request
     * @param string $event_id
     * @return mixed
     */
    public function showOrders(Request $request, $event_id = '')
    {
        $allowed_sorts = ['first_name', 'email', 'order_reference', 'order_status_id', 'created_at'];

        $searchQuery = $request->get('q');
        $sort_by = (in_array($request->get('sort_by'), $allowed_sorts) ? $request->get('sort_by') : 'created_at');
        $sort_order = $request->get('sort_order') == 'asc' ? 'asc' : 'desc';

        $event = Event::findOrFail($event_id);

        if ($searchQuery) {
            /*
             * Strip the hash from the start of the search term in case people search for
             * order references like '#EDGC67'
             */
            if ($searchQuery[0] === '#') {
                $searchQuery = str_replace('#', '', $searchQuery);
            }

            $orders = $event->orders()
                ->where(function ($query) use ($searchQuery) {
                    $query->where('order_reference', 'like', $searchQuery . '%')
                        ->orWhere('first_name', 'like', $searchQuery . '%')
                        ->orWhere('email', 'like', $searchQuery . '%')
                        ->orWhere('last_name', 'like', $searchQuery . '%');
                })
                ->orderBy($sort_by, $sort_order)
                ->paginate();
        } else {
            $orders = $event->orders()->orderBy($sort_by, $sort_order)->paginate();
        }

        $data = [
            'orders'     => $orders,
            'event'      => $event,
            'sort_by'    => $sort_by,
            'sort_order' => $sort_order,
            'q'          => $searchQuery ? $searchQuery : '',
            'is_embedded'  => $request->is_embedded
        ];

        return view('ManageEvent.Orders', $data);
    }


    public function showOrdersUsers(String $user_id)
    {
        
        $sort_by = 'created_at';
        $sort_order =  'desc';

        $user = User::findOrfail($user_id);
        $user_email = $user->email;
        $order = Order::where('email',$user_email);

        $orders = $order->orderBy($sort_by, $sort_order)->paginate();

        $data = [
            'orders'     => $orders,
            'q'          => '',
            'sort_by'    => $sort_by,
            'sort_order' => $sort_order,
        ];

        return view('ManageEvent.userOrders', $data);
    }

    /**
     * Shows  'Manage Order' modal
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function manageOrder(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);

        $orderService = new OrderService($order->amount, $order->booking_fee, $order->event);
        $orderService->calculateFinalCosts();

        $data = [
            'order' => $order,
            'orderService' => $orderService
        ];

        return view('ManageEvent.Modals.ManageOrder', $data);
    }

    /**
     * Shows 'Edit Order' modal
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function showEditOrder(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);

        $data = [
            'order'     => $order,
            'event'     => $order->event(),
            'attendees' => $order->attendees()->withoutCancelled()->get(),
            'modal_id'  => $request->get('modal_id'),
        ];

        return view('ManageEvent.Modals.EditOrder', $data);
    }

    /**
     * Shows 'Cancel Order' modal
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function showCancelOrder(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);

        $data = [
            'order'     => $order,
            'event'     => $order->event(),
            'attendees' => $order->attendees()->withoutCancelled()->get(),
            'modal_id'  => $request->get('modal_id'),
        ];

        return view('ManageEvent.Modals.CancelOrder', $data);
    }

    /**
     * Resend an entire order
     *
     * @param $order_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resendOrder($order_id)
    {
        $order = Order::findOrFail($order_id);

        $this->dispatch(new SendOrderTickets($order));

        return response()->json([
            'status'      => 'success',
            'redirectUrl' => '',
        ]);    }

    /**
     * Cancels an order
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function postEditOrder(Request $request, $order_id)
    {
        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $order = Order::findOrFail($order_id);

        $order->first_name = $request->get('first_name');
        $order->last_name = $request->get('last_name');
        $order->email = $request->get('email');

        $order->update();


        \Session::flash('message', trans("Controllers.the_order_has_been_updated"));

        return response()->json([
            'status'      => 'success',
            'redirectUrl' => '',
        ]);
    }


    /**
     * Cancels an order
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function postCancelOrder(Request $request, $order_id)
    {
        $rules = [
            'refund_amount' => ['numeric'],
        ];
        $messages = [
            'refund_amount.integer' => trans("Controllers.refund_only_numbers_error"),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }
// -----------------------------------------------------------------------------------------------------------------------------------------------
        $order = Order::findOrFail($order_id);

        $refund_order = ($request->get('refund_order') === 'on') ? true : false;
        $refund_type = $request->get('refund_type');
        $refund_amount = round(floatval($request->get('refund_amount')), 2);
        $attendees = $request->get('attendees');
        $error_message = false;

        if ($refund_order && $order->payment_gateway->can_refund) {
            if (!$order->transaction_id) {
                $error_message = trans("Controllers.order_cant_be_refunded");
            }

            if ($order->is_refunded) {
                $error_message = trans("Controllers.order_already_refunded");
            } elseif ($order->organiser_amount == 0) {
                $error_message = trans("Controllers.nothing_to_refund");
            } elseif ($refund_type !== 'full' && $refund_amount > round(($order->organiser_amount - $order->amount_refunded),
                    2)
            ) {
                $error_message = trans("Controllers.maximum_refund_amount", ["money"=>(money($order->organiser_amount - $order->amount_refunded,
                        $order->event->currency))]);
            }
            if (!$error_message) {
                try {
                    $gateway = Omnipay::create($order->payment_gateway->name);

                    $gateway->initialize($order->account->getGateway($order->payment_gateway->id)->config);

                    if ($refund_type === 'full') { /* Full refund */
                        $refund_amount = $order->organiser_amount - $order->amount_refunded;
                    }

                    $request = $gateway->refund([
                        'transactionReference' => $order->transaction_id,
                        'amount'               => $refund_amount,
                        'refundApplicationFee' => floatval($order->booking_fee) > 0 ? true : false,
                    ]);

                    $response = $request->send();

                    if ($response->isSuccessful()) {
                        /* Update the event sales volume*/
                        $order->event->decrement('sales_volume', $refund_amount);
                        $order->amount_refunded = round(($order->amount_refunded + $refund_amount), 2);

                        if (($order->organiser_amount - $order->amount_refunded) == 0) {
                            $order->is_refunded = 1;
                            $order->order_status_id = config('attendize.order_refunded');
                        } else {
                            $order->is_partially_refunded = 1;
                            $order->order_status_id = config('attendize.order_partially_refunded');
                        }
                    } else {
                        $error_message = $response->getMessage();
                    }

                    $order->save();
                } catch (\Exeption $e) {
                    Log::error($e);
                    $error_message = trans("Controllers.refund_exception");
                }
            }

            if ($error_message) {
                return response()->json([
                    'status'  => 'success',
                    'message' => $error_message,
                ]);
            }
        }

        /*
         * Cancel the attendees
         */
        if ($attendees) {
            foreach ($attendees as $attendee_id) {
                $attendee = Attendee::where('id', '=', $attendee_id)->first();
                $attendee->ticket->decrement('quantity_sold');
                $attendee->ticket->decrement('sales_volume', $attendee->ticket->price);
                $order->event->decrement('sales_volume', $attendee->ticket->price);
                $order->decrement('amount', $attendee->ticket->price);
                $attendee->is_cancelled = 1;
                $attendee->save();

                $eventStats = EventStats::where('event_id', $attendee->event_id)->where('date', $attendee->created_at->format('Y-m-d'))->first();
                if($eventStats){
                    $eventStats->decrement('tickets_sold',  1);
                    $eventStats->decrement('sales_volume',  $attendee->ticket->price);
                }
            }
        }
        if(!$refund_amount && !$attendees)
            $msg = trans("Controllers.nothing_to_do");
        else {
            if($attendees && $refund_order)
                $msg = trans("Controllers.successfully_refunded_and_cancelled");
            else if($refund_order)
                $msg = trans("Controllers.successfully_refunded_order");
            else if($attendees)
                $msg = trans("Controllers.successfully_cancelled_attendees");
        }

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------

        \Session::flash('message', $msg);

        return response()->json([
            'status'      => 'success',
            'redirectUrl' => '',
        ]);
    }

    /**
     * Exports order to popular file types
     *
     * @param $event_id
     * @param string $export_as Accepted: xls, xlsx, csv, pdf, html
     */
    public function showExportOrders($event_id, $export_as)
    {
<<<<<<< HEAD
        $start = microtime(true);
        $event = Event::with('orders')->findOrFail($event_id);
=======
        $event = Event::findOrFail($event_id);
        Excel::create('orders-as-of-' . date('d-m-Y-g.i.a'), function ($excel) use ($event) {
>>>>>>> 6fcaf954c9dcb5bd8cb0d3b4ea1097050616d635

        Excel::create('orders-' .$event->title. '-of-' . date('d-m-Y-g.i.a'), function ($excel) use ($event) {
            
            $excel->setTitle('Orders For Event: ' . $event->title);
            
            // Chain the setters
            $excel->setCreator(config('attendize.app_name'))
<<<<<<< HEAD
            ->setCompany(config('attendize.app_name'));
            
            $excel->sheet('orders_1', function ($sheet) use ($event) {
                $orders = Order::with(['attendees','attendees.ticket'])
                                ->where('event_id',$event->id)
                                ->where('order_status_id', config('attendize.order_complete'))
                                ->orderBy('DESC')->get();

                $indice = 0;
                foreach($orders as $index => $order) {
                    $attendees = $order->attendees;
                    $description = "";
                    $currency = [];
                    $stage = [];
                    $tickets = [];
                    foreach($attendees as $attendee) {
                        if(!isset($tickets[$attendee->ticket->description])) {
                            $tickets[$attendee->ticket->description] = 0;
                        }
                        $tickets[$attendee->ticket->description] ++;
                        $currency[] = $attendee->ticket->currency;
                        $stage[] = $attendee->ticket->stage;
                    }
                    $description = urldecode(str_replace('=', ':', http_build_query($tickets, null, ',')));
                    $currency = array_unique($currency);
                    $stage = array_unique($stage);

                        $sheet->row(($indice++)+2, [
                            $order['order_reference'],
                            $order['first_name'],
                            $order['last_name'],
                            $order['email'],
                            $order['amount'],
                            implode(",", $currency),
                            $description,
                            implode(",", $stage),
                            $order['created_at']
                            ]);	
                }
=======
                ->setCompany(config('attendize.app_name'));


                $data = Order::where('orders.event_id', '=', $event->id)
                    ->where('orders.event_id', '=', $event->id)
                    ->select([
                        'orders.first_name',
                        'orders.last_name',
                        'orders.email',
                        'orders.order_reference',
                        'orders.amount',
                        // \DB::raw("(CASE WHEN orders.is_refunded = 1 THEN '$yes' ELSE '$no' END) AS `orders.is_refunded`"),
                        // \DB::raw("(CASE WHEN orders.is_partially_refunded = 1 THEN '$yes' ELSE '$no' END) AS `orders.is_partially_refunded`"),
                        'orders.amount_refunded',
                        'orders.created_at',
                    ])->get();

                return $data;


            $excel->sheet('orders_sheet_1', function ($sheet) use ($event) {

                // \DB::connection()->setFetchMode(\PDO::FETCH_ASSOC);
                $yes = strtoupper(trans("basic.yes"));
                $no = strtoupper(trans("basic.no"));
                $data = Order::where('orders.event_id', '=', $event->id)
                    ->where('orders.event_id', '=', $event->id)
                    ->select([
                        'orders.first_name',
                        'orders.last_name',
                        'orders.email',
                        'orders.order_reference',
                        'orders.amount',
                        // \DB::raw("(CASE WHEN orders.is_refunded = 1 THEN '$yes' ELSE '$no' END) AS `orders.is_refunded`"),
                        // \DB::raw("(CASE WHEN orders.is_partially_refunded = 1 THEN '$yes' ELSE '$no' END) AS `orders.is_partially_refunded`"),
                        'orders.amount_refunded',
                        'orders.created_at',
                    ])->get();
                //DB::raw("(CASE WHEN UNIX_TIMESTAMP(`attendees.arrival_time`) = 0 THEN '---' ELSE 'd' END) AS `attendees.arrival_time`"))

                $sheet->fromArray($data);
>>>>>>> 6fcaf954c9dcb5bd8cb0d3b4ea1097050616d635

                // Add headings to first row
                $sheet->row(1, [
                    trans("Order.order_ref"),
                    trans("Attendee.first_name"),
                    trans("Attendee.last_name"),
                    trans("Attendee.email"),
                    trans("Order.amount"),
                    'Moneda',
                    'Descripción de la compra',
                    'Etapa de Venta',
                    trans("Order.order_date"),
                ]);

                $sheet->cell(
                    'A1:I1', function ($cell) {
                        $cell->setBackground('#CFBEE5 f5f5f5');
                        $cell->setAlignment('center');
                        $cell->setFontsize('16');
                    }
                );
            });
        })->export($export_as);
        
        $end = microtime(true) - $start;
        $sec = intval($end);
        $micro = $end - $sec;
        $final = strftime('%T', mktime(0, 0, $sec)) . str_replace('0.', '.', sprintf('%.3f', $micro));
        var_dump($final);die;
    }

    /**
     * shows 'Message Order Creator' modal
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function showMessageOrder(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);

        $data = [
            'order' => $order,
            'event' => $order->event,
        ];

        return view('ManageEvent.Modals.MessageOrder', $data);
    }

    /**
     * Sends message to order creator
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function postMessageOrder(Request $request, $order_id)
    {
        $rules = [
            'subject' => 'required|max:250',
            'message' => 'required|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $order = Order::findOrFail($order_id);

        $data = [
            'order'           => $order,
            'message_content' => $request->get('message'),
            'subject'         => $request->get('subject'),
            'event'           => $order->event,
            'email_logo'      => $order->event->organiser->full_logo_path,
        ];

        Mail::send('Emails.messageReceived', $data, function ($message) use ($order, $data) {
            $message->to($order->email, $order->full_name)
                ->from(config('attendize.outgoing_email_noreply'), $order->event->organiser->name)
                ->replyTo($order->event->organiser->email, $order->event->organiser->name)
                ->subject($data['subject']);
        });

        /* Send a copy to the Organiser with a different subject */
        if ($request->get('send_copy') == '1') {
            Mail::send('Emails.messageReceived', $data, function ($message) use ($order, $data) {
                $message->to($order->event->organiser->email)
                    ->from(config('attendize.outgoing_email_noreply'), $order->event->organiser->name)
                    ->replyTo($order->event->organiser->email, $order->event->organiser->name)
                    ->subject($data['subject'] . trans("Email.organiser_copy"));
            });
        }

        return response()->json([
            'status'  => 'success',
            'message' => trans("Controllers.message_successfully_sent"),
        ]);
    }

    /**
     * Mark an order as payment received
     *
     * @param Request $request
     * @param $order_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postMarkPaymentReceived(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);

        $order->is_payment_received = 1;
        $order->order_status_id = 1;

        $order->save();

        session()->flash('message', trans("Controllers.order_payment_status_successfully_updated"));

        return response()->json([
            'status' => 'success',
        ]);
    }
}
