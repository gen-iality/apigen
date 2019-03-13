<?php

namespace App\Http\Controllers;


use App\Jobs\SendOrderTickets;
use App\Attendee;
use App\Event;
use App\User;
use App\Models\EventStats;
use App\Models\OrderStatus;
use App\Order;
use App\Models\Ticket;
use App\Models\OrderItem;
use App\evaLib\Services\Order as OrderService;
use DB;
use Excel;
use Illuminate\Http\Request;
use Log;
use Mail;
use Omnipay;
use Validator;
use Carbon;

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
        $orderStatus = OrderStatus::all();
        $tickets = Attendee::where('order_id',$order_id)->get();
        $tickets_name = Ticket::select('title','_id')->where('event_id',$order->event_id)->get();
        $data = [
            'order'     => $order,
            'tickets'   => $tickets,
            'tickets_name' => $tickets_name,
            'event'     => $order->event(),
            'attendees' => $order->attendees()->withoutCancelled()->get(),
            'modal_id'  => $request->get('modal_id'),
            'orderStatus' => $orderStatus,
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

        //UPDATE ORDERS
        //Validamos si alguno de los campos tiene un cambio, si es asi actualizamos
        $order = Order::findOrFail($order_id);
        if(
            $order->first_name != $request->get('first_name') ||
            $order->last_name != $request->get('last_name') ||
            $order->email != $request->get('email') ||
            $order->order_status_id != $request->get('order_status_id')
        ){
            $order->first_name = $request->get('first_name');
            $order->last_name = $request->get('last_name');
            $order->email = $request->get('email');
            $order->order_status_id = $request->get('order_status_id');
            $order->update();
        }
        //UPDATE TICKETS
        //Cargamos los datos de los asistentes de la orden
        $attendees = Attendee::where('order_id',$order_id)->get();
        //Necesitamos el evento para cargar las propiedades de los usuarios
        $event = Event::findOrFail($order->event_id);
        //Recorremos cada uno de los attendizes
        foreach($attendees as $index => $attende){
            //Miramos si el usuario lo quiere eliminar, para eliminarlo y no continuar con la actualización de datos
            $field_delete = $name_field = 'delete_'.$index;
            if($request->get($field_delete)){
                //Eliminamos attendice
                $attende->forceDelete();
                //Disminuimos 1 en la cantidad de boletas compradas
                $order_items = OrderItem::where('order_id',$order_id)->first();
                $order_items->quantity = (int)($order_items->quantity) - 1;
                $order_items->update();
                continue;
            }

            $attende_properties = $attende->properties;
            //Generamos un array con los nuevos campos, guardamos los nuevos datos ahí
            $user_properties_array = [];
            $flag = true;
            foreach($event->user_properties as $user_properties){
                //Guardamos valor uno por uno
                $property_name = $user_properties['name'];
                //Capturamos el valor del campo del Request, recuerde que este llega con un valor creciende (1,2,3, ...)
                $name_field = $property_name.'_'.$index;
                //Nuevo Valor que se debe reeemplazar
                $property_new_value = $request->get($name_field);
                $user_properties_array += [$property_name => $property_new_value];
            }
            //Guardamos el array y actualizamos
            if($attende->properties != $user_properties_array){
                $attende->properties = $user_properties_array;
                $attende->update();
            }
        }

        //CREATE TICKETS
        //Generamos un array con los nuevos campos, guardamos los nuevos datos ahí
        $user_properties_array = [];
        $flag = true;
        foreach($event->user_properties as $user_properties){
            //Guardamos valor uno por uno
            $property_name = $user_properties['name'];
            //Capturamos el valor del campo del Request, recuerde que este llega con un valor creciende (1,2,3, ...)
            if($request->get($property_name.'_new') && $flag){
                $this->completeTicket($order_id, $request);
                $flag = false;
            }
        }

        \Session::flash('message', trans("Controllers.the_order_has_been_updated"));

        return response()->json([
            'status'      => 'success',
            'redirectUrl' => '',
        ]);
    }



    /**
     * Complete an Ticket
     *
     * @param $event_id
     * @param bool|true $return_json
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function completeTicket($order_id, $request)
    {
        //Si la orden ya fue creada entonces redirigimos al recibo con los ticketes, si no
        //vamos a crear la orden a partir del cache.
        //EL CACHE ES INDISPENSABLE EN ESTE CONTROLADOR

            try {

                $order = Order::findOrfail($order_id);
                $event_id = $order->event_id;
    
                //Buscamos el evento el cual le pertence el ticket
                $event = Event::findOrFail($event_id);
                $fields = $event->user_properties;
                $attendee_increment = Attendee::where('order_id',$order_id)->count() + 1;
                
                /*
                 * Update the event sales volume
                 */
                $event->increment('sales_volume', 1);
                $event->increment('organiser_fees_volume', 1);
    
    
                /*
                 * Update the event stats
                 */
                $event_stats = EventStats::updateOrCreate([
                    'event_id' => $event_id,
                    'date' => (Carbon::now())->toDateString(),
                ]);
    
                $event_stats->increment('tickets_sold', 1);
    
                /*
                    * Insert order items (for use in generating invoices)
                */
                //Buscamos el nombre del tiquet y lo buscamos en los order item por el nombre
                $ticket = Ticket::findOrFail($request->get('ticket_id'));
                $OrderItem = OrderItem::where('order_id',$order_id)->where('title',$ticket->title)->first();
                if(isset($OrderItem)){
                    $OrderItem->quantity = (int)($OrderItem->quantity) + 1;
                    $OrderItem->update();
                }else{
                    $orderItem = new OrderItem();
                    $orderItem->title = $ticket->title;
                    $orderItem->quantity = 1;
                    $orderItem->order_id = $order_id;
                    $orderItem->unit_price = $ticket->price;
                    $orderItem->unit_booking_fee = 0;
                    $orderItem->save();
                }
                /*
                 * Create the attendees
                 */
                $attendee = new Attendee();

                //Generamos un array con los nuevos campos, guardamos los nuevos datos ahí
                $attendee->properties = [];
                $user_properties_array = [];
                foreach($event->user_properties as $user_properties){
                    //Guardamos valor uno por uno
                    $property_name = $user_properties['name'];
                    //Capturamos el valor del campo del Request, recuerde que este llega con un valor creciende (1,2,3, ...)
                    $name_field = $property_name.'_new';
                    //Nuevo Valor que se debe reeemplazar
                    $property_new_value = $request->get($name_field);
                    $user_properties_array += [$property_name => $property_new_value];
                }
                //Guardamos el array y actualizamos
                $attendee->properties = $user_properties_array;
                $attendee->event_id = $event_id;
                $attendee->order_id = $order->id;
                $attendee->ticket_id = $request->get('ticket_id');
                $attendee->account_id = $event->account->id;
                $attendee->reference_index = $attendee_increment;
                $attendee->save();

            } catch (Exception $e) {

                Log::error($e);
                // DB::rollBack();

                return response()->json([
                    'status' => 'error',
                    'message' => 'Whoops! There was a problem processing your order. Please try again.',
                ]);

            }

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
    public function showExportOrders($event_id, $export_as = 'xls')
    {
        $event = Event::findOrFail($event_id);
        Excel::create('orders-as-of-' . date('d-m-Y-g.i.a'), function ($excel) use ($event) {

            $excel->setTitle('Orders For Event: ' . $event->title);

            // Chain the setters
            $excel->setCreator(config('attendize.app_name'))
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

                // Add headings to first row
                $sheet->row(1, [
                    trans("Attendee.first_name"),
                    trans("Attendee.last_name"),
                    trans("Attendee.email"),
                    trans("Order.order_ref"),
                    trans("Order.amount"),
                    trans("Order.fully_refunded"),
                    trans("Order.partially_refunded"),
                    trans("Order.amount_refunded"),
                    trans("Order.order_date"),
                ]);

                // Set gray background on first row
                $sheet->row(1, function ($row) {
                    $row->setBackground('#f5f5f5');
                });
            });
        })->export($export_as);
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
