<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Http\Resources\OrderResource;
use App\evaLib\Services\OrdersServices;
use Illuminate\Http\Request;

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
        $ticket_order = $request->get('ticket_order_' . $event_id);
        $request_data = $ticket_order['request_data'];
        $event = Event::findOrFail($ticket_order['event_id']);
        $fields = $event->user_properties;
        $ticket_questions = isset($request_data['ticket_holder_questions']) ? $request_data['ticket_holder_questions'] : [];

        $result = OrdersServices::CreateAnOrder($ticket_order, $request_data, $event, $fields);

        $response->additional(['status' => $result->status, 'message' => $result->message]);

        return $response;

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
    public function update(Request $request, Orders $orders)
    {
        //
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

        $data = [
            'order'        => $order,
            'orderService' => $orderService,
            'event'        => $order->event,
            'tickets'      => $order->event->tickets,
        ];
        return OrderResource::collection($data);
    }
}
