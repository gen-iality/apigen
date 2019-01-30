<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Event;
use App\Http\Resources\OrderResource;
use App\evaLib\Services\OrdersServices;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Ticket;

class ApiOrdersController extends Controller
{
    /**
     * __index:__ Display all the Orders of an event
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByEvent(Request $request, String $event_id)
    {
        $query = Order::where("event_id", $event_id)->get();

        // $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $request);

        return OrderResource::collection($query);

    }
    /**
     * __index:__ Display all the Orders of an user
     *
     * @return \Illuminate\Http\Response
     */
    public function ordersByUsers(Request $request, String $user_id)
    {
        $user = User::findOrFail($user_id);
        $email = $user->email;

        return OrderResource::collection(
            Order::where("email", $email)
                ->paginate(config('app.page_size'))
            );
    }
    /**
     * Display all the Orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return OrderResource::collection(
            Order::paginate(config('app.page_size'))
        );
    }

    /**
     * Store a newly created Order in storage.
     * 
     * @param request $request
     * @param string $event_id
     * @param bool|true $return_json
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, String $event_id, $return_json = true)
    {
        $request_data = $request;
        $event = Event::findOrFail($event_id);
        $fields = $event->user_properties;
        $booking_fee = 0;
        $organiser_booking_fee = 0;
        $activeAccountPaymentGateway = 3;
        $paymentGateway = 3;
        $order_expires_time = Carbon::now()->addMinutes(1000000);
        $order_total = 300000;
        $tickets = [];
        $total_ticket_quantity = 0;

        $ticket_order = [
            // 'validation_rules' => $validation_rules,
            // 'validation_messages' => $validation_messages,
            'event_id' => $event->id,
            'tickets' => $tickets,
            'total_ticket_quantity' => $total_ticket_quantity,
            'order_started' => time(),
            'expires' => $order_expires_time,
            // 'reserved_tickets_id' => $reservedTickets->id,
            'order_total' => $order_total,
            'booking_fee' => $booking_fee,
            'organiser_booking_fee' => $organiser_booking_fee,
            'total_booking_fee' => $booking_fee + $organiser_booking_fee,
            'order_requires_payment' => (ceil($order_total) == 0) ? false : true,
            'account_id' => $event->account->id,
            // 'affiliate_referral' => Cookie::get('affiliate_' . $event_id),
            'account_payment_gateway' => $activeAccountPaymentGateway,
            'payment_gateway' => $paymentGateway,
        ];

        $result = OrdersServices::createAnOrder($ticket_order, $request_data, $event, $fields);

        return $result;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(String $event_id, String $orders_id)
    {    
        $order = Order::findOrFail($orders_id);
        return new OrderResource($order);
    }

    /**
     * Cancels an order
     *
     * @param Request $request
     * @param $order_id
     * @return mixed
     */
    public function cancelOrder(Request $request, String $order_id)
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

        try {

            $result = OrdersServices::cancelAnOrder($request, $order_id);
            $response->additional(['status' => $result->status, 'message' => $result->message]);

        } catch (\Exception $e) {

            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $event_id, String $order_reference)
    {
        $status = $request['status'];
        $order = Order::where('order_reference', '=', $order_reference)->first();

        $result = OrdersServices::updateAnOrder($order_reference, $status);

        $response = (['status' => $result->status, 'message' => $result->message]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }

    /**
     * Show the order details page
     *
     * @param Request $request
     * @param $order_reference
     * @return \Illuminate\View\View
     */
    public function showDetailsOrder(Request $request, $order_reference)
    {
        $order = Order::where('order_reference', '=', $order_reference)->first();

        $orderService = new OrderService($order->amount, $order->organiser_booking_fee, $order->event);
        $orderService->calculateFinalCosts();
        
        return OrderResource::collection($order);
    }
    /**
     * Delete Attendee
     *
     * @param [type] $ticket_id
     * @param [type] $order_id
     * @return void
     */
    public function deleteAttendee($order_id, $attendee_id){
        $result = OrdersServices::deleteAttendee($order_id, $attendee_id);
        $response = (['status' => $result->status, 'message' => $result->message]);
        return $response;
    }

    /**
     * 
     *  
     */
    public function storeAttendee(Request $request, String $event_id, String $order_id)
    { 
        // $attendee_details = [
        //     'ticket_id' => $ticket,
        //     'qty' => $current_ticket_quantity
        // ];

        // $request_data = 
        // "tiket_holder_Cédula": [
        //     {
        //         "5c4a4773342254198e226262": "1014180319"
        //     }
        // ],
        // "tiket_holder_names": [
        //     {
        //         "5c4a4773342254198e226262": "kimberly mateus"
        //     }
        // ];

        $data = $request->json()->all();

        $attendee_details = $data['attendee_details'];

        $request_data = $data['request_data'];

        $result = OrdersServices::addAttendee($attendee_details, $order_id, $event_id, $request_data);
        
        $response = (['status' => $result->status, 'message' => $result->message]);
        return $response;
    }
}
