<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Account;
use App\Attendee;
use App\Event;
use App\DiscountCodeTemplate;
use App\Http\Resources\OrderResource;
use App\evaLib\Services\OrdersServices;
use App\evaLib\Services\UserEventService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Ticket;
use Auth;
use Validator;
/**
 * @group Orders
 * 
 * The purpose of this end point is to store all the information of a user's payment orders 
 */
class ApiOrdersController extends Controller
{
    /**
     * _index_: list of all orders  
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
     * _store_: create new order
     *
     * @bodyParam items array required the items are the id of the event in case of buying a course or the id of the discount code template in case of buying a code Example:  ["5ea23acbd74d5c4b360ddde2"]
     * @bodyParam account_id string required id of the user making the purchase Example: 5f450fb3d4267837bb128102
     * @bodyParam amount integer required total order value Example: 10000
     * @bodyParam item_type string required item type discountCode or event Example: discountCode
     * @bodyParam discount_codes array disount code 
     * @bodyParam document_number string document number of the user who is going to make the payment
     * @bodyParam telephone string contact number of the user who is going to make the payment
     * @bodyParam city string contact number of the user who is going to make the payment
     * @bodyParam address string residence address of the user who is going to make the payment
     * @bodyParam user_first_name string  user name who is going to make the payment
     * @bodyParam user_last_name  string  user last name who is going to make the payment
     * @bodyParam properties object Example: {"document_number" : "1014305626","telephone" : "30058744512","city" : "Bogotá","adress" : "Calle falsa 123", "user_first_name" : "Pepe" ,"user_last_name" : "Lepu"} 
     * 
     * @param request $request
     * @param string $event_id
     * @param bool|true $return_json
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $return_json = true)
    {
        $request_data = $request->json()->all();
        
        $ids  =  $request_data['items'];

        $event = '';

        if( $request_data['item_type'] == 'discountCode')
        {
            $codeTemplate = DiscountCodeTemplate::findOrFail($ids[0]);

            //Since the purchase of the codes will be taken into account in the orders. 
            //These will not always be for an event but also for an organization so the event_id may or may not come
            if(isset($codeTemplate->event_id)){
                $event = Event::findOrFail($codeTemplate->event_id);            
            }

        }else{
            $event = Event::findOrFail($ids[0]);
        }

        $account = Account::findOrFail($request_data['account_id']);
        $fields = isset($event->user_properties) ? $event->user_properties : '';
        $booking_fee = 0;
        $organiser_booking_fee = 0;
        $activeAccountPaymentGateway = 3;
        $paymentGateway = 3;
        $order_expires_time = Carbon::now()->addMinutes(1000000);
        $order_total =  $request_data['amount'];
        $tickets = [];
        $total_ticket_quantity = 0;

        $ticket_order = [
            // 'validation_rules' => $validation_rules,
            // 'validation_messages' => $validation_messages,
            'event_id' => isset($event->id) ? $event->id : '' ,
            'tickets' => $tickets,
            'items' => $ids,
            'total_ticket_quantity' => $total_ticket_quantity,
            'order_started' => time(),
            'expires' => $order_expires_time,
            // 'reserved_tickets_id' => $reservedTickets->id,
            'order_total' => $order_total,
            'booking_fee' => $booking_fee,
            'organiser_booking_fee' => $organiser_booking_fee,
            'total_booking_fee' => $booking_fee + $organiser_booking_fee,
            'order_requires_payment' => (ceil($order_total) == 0) ? false : true,
            'account_id' => $account->_id,
            // 'affiliate_referral' => Cookie::get('affiliate_' . $event_id),
            'account_payment_gateway' => $activeAccountPaymentGateway,
            'payment_gateway' => $paymentGateway,
        ];

        $request_data['order_first_name'] = $account->names;
        $request_data['order_last_name'] =  "";
        $request_data['order_email'] =  $account->email;


        $request_data['properties'] =  isset($request_data['properties']) ? $request_data['properties'] : [];

        
        $result = OrdersServices::createAnOrder($ticket_order, $request_data, $event, $fields);

        return $result;

    }

    /**
     * _destroy_: remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * _show_: view order-specific information
     * 
     * @urlParam order required order id Example: 5fbd84e345611e292f04ab92
     * 
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(String $orders_id)
    {    
        $order = Order::findOrFail($orders_id);
        return new OrderResource($order);
    }

    /**
     * _index_: display all the Orders of an event
     *
     * @urlParam event_id required Example: 5ea23acbd74d5c4b360ddde2
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
     * _index_: display all the Orders of an user 
     * 
     * @urlParam user_id required Example: 5f450fb3d4267837bb128102
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
     * _index:_ display all the Orders of an user logueado
     * 
     * @authenticated
     * 
     * @return \Illuminate\Http\Response
     */
    public function meOrders(Request $request)
    {
        $user = Auth::user();

        return OrderResource::collection(
            Order::where("account_id", $user->id)
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * _cancelOrder_: cancels an order
     * 
     * @urlParam order_id required 5fbd84e345611e292f04ab92
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
            return response()->json( 
                [
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
                ]
            );
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
     * _update_: update the specified resource in storage.
     *
     * @bodyParam items array  id of the event from which the purchase is made Example:  ["5ea23acbd74d5c4b360ddde2"]
     * @bodyParam account_id string  id of the user making the purchase Example: 5f450fb3d4267837bb128102
     * @bodyParam amount integer  total order value Example: 10000
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
        $data = $request->json()->all();
        $attendee_details = $data['attendee_details'];
        $request_data = $data['request_data'];
        $result = OrdersServices::addAttendee($attendee_details, $order_id, $event_id, $request_data);
        $response = (['status' => $result->status, 'message' => $result->message]);
        return $response;
    }

    /**
     * 
     *  
     */
    public function createUserAndAddtoEvent(Request $request, string $event_id, String $order_id)
    {
        // return $request;

        
        try {

            //las propiedades dinamicas del usuario se estan migrando de una propiedad directa
            //a estar dentro de un hijo llamado properties
            $eventUserData = $request->json()->all();

            $event = Event::find($event_id);
            $user_properties = $event->user_properties;
            $userData = $request->json()->all();

            if (isset($eventUserData['properties'])) {
                $userData = $eventUserData['properties'];
            }

            /* Se le agrega el id de la orden en la variable eventUserData
            si esta viene si no, no se agrega nada. */

            if (isset($order_id)) {
                $eventUserData['order_id'] = $order_id;
            }

            $result = UserEventService::importUserEvent($event, $eventUserData, $userData);
            $response = new OrderResource($result->data);
            $response->additional(['status' => $result->status, 'message' => $result->message]);
        } catch (\Exception $e) {

            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }
        return $response;
    }
}
