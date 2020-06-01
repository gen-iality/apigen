<?php
/**
 *
 */
namespace App\evaLib\Services;

use App\Event;
use App\Attendee;
use App\Rol;
use App\Order;
use App\State;
use App\Account;
use Carbon\Carbon;
use App\Models\OrderItem;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log;

/**
 * Undocumented class
 */
class UserEventService
{

    const CREATED = 'CREATED';
    const UPDATED = 'UPDATED';
    const MESSAGE = 'OK';

    /**
     * Undocumented function
     *
     * @param Event $event
     * @param [type] $userData
     * @return void
     */
    public static function importUserEvent(Event $event, $eventUserFields, $userData)
    {
        // return 0;
        $result_status = null;
        $data = null;
        $message = "OK";
        $date = Carbon::now();
        $date = $date->format('his');
        
        /* Buscamos el ticket */
        if(isset($eventUserFields['ticket_id'])){
            $ticket = Ticket::findOrFail($eventUserFields['ticket_id']);
            $ticket_details['qty'] = 1;

            // return $ticket;

            /*
            * Update some ticket info
            */
            $ticket->increment('quantity_sold', $ticket_details['qty']);
            $ticket->increment('sales_volume', ($ticket['price'] * $ticket_details['qty']));
            $ticket->increment('organiser_fees_volume', ($ticket['organiser_booking_fee'] * $ticket_details['qty']));
        }

         /* Si viene el id de la orden en la variable eventUserFields
        buscamos la orden  */
        if (isset($eventUserFields["order_id"])) {

            $order = Order::findOrFail($eventUserFields["order_id"]);

           
            //Insert order items (for use in generating invoices)

           $orderItem = new OrderItem();
           $orderItem->title = $ticket['title'];
           $orderItem->quantity = 1;
           $orderItem->order_id = $order->id;
           $orderItem->unit_price = $ticket['price'];
           $orderItem->unit_booking_fee = $ticket['booking_fee'] + $ticket['organiser_booking_fee'];
           $orderItem->save();
        }
        


        /* Si no existe el correo le creamos uno, anteriormente se mostraba un error */
        // if (!isset($userData['email'])) {
        //     $userData['email'] = 'event_'.$date.'@evius.co';
        // }
         /* Si no existe el correo le mostramos el error */
         if (!isset($userData['email'])) {
            throw new \Exception('email is missing and is required');
        }

        /* Buscamos primero el usuario por email y sino existe lo creamos */
        $email = $userData['email'];
        $matchAttributes = ['email' => $email];
    
        if (!isset($userData['names'])) {
            $userData['names'] = isset($userData['firstName']) ? $userData['firstName'] : $userData['email'];
        }

        if (isset($userData['names'])) {
            $userData['displayName'] = $userData['names'];
            // unset($userData['names']);
        }

        $user = Account::updateOrCreate($matchAttributes, $userData);


        /* ya con el usuario actualizamos o creamos el eventUser */
        $matchAttributes = ["event_id" => $event->id, "account_id" => $user->id];

        $eventUserFields += $matchAttributes;

        //avoid saving uid as user properties
        if (isset($userData['uid'])) {
            unset($userData['uid']);
        }

        $eventUserFields["properties"] = $userData;

        //Account rol assigned by default
        if (!isset($eventUserFields["rol_id"])) {
            $rol = Rol::where('level', 0)->first();
            $eventUserFields["rol_id"] = $rol->_id;
        }
        $eventUserFields["rol_id"] = "5afaf644500a7104f77189cd";

        //esto por que se nos fue un error en el excel al princiopo
        if (isset($eventUserFields["state_id"])) {
            unset($eventUserFields["state_id"]);
        }       
                
        //eventUser booking status default value
        // Si el usuario no tiene asignado un estado, poner un estado por defecto
        if (!isset($user->state_id) || !$user->state_id) {
            $temp = State::first();
            $eventUserFields["state_id"] = $temp->_id;
        }
 
        // Si dentro de la petición viene el estado, colocarle el estado que viene en la petición
        if (isset($eventUserFields["state"])) {
            $temp = State::where('name', strtoupper($eventUserFields["state"]))->first();
            //Si encuentra el estado por nombre, es finalmente colocado por id, 
            //Si no lo encuentra borra el valor del estado de la petición
            if ($temp && isset($temp->_id)) {
                $eventUserFields["state_id"] = $temp->_id;
            }
            if (isset($eventUserFields["state"])) {
                unset($eventUserFields["state"]);
            }

        }


        $model = Attendee::where($matchAttributes)->first();
        
        //Si algun campo no se envia para importar, debe mantener los datos ya guardados en la base de datos
        if ($model){
            //var_dump($model->properties);die;
            $eventUserFields["properties"] = array_merge($model->properties,$eventUserFields["properties"]);
        }
        /* guardamos el Attendee o eventUser */
        if(!empty($eventUserFields["eventuser_id"])){
            $eventUserFound = Attendee::find($eventUserFields["eventuser_id"]);
            $eventUserFound->update($eventUserFields);
            $eventUser= $eventUserFound;
        }else{
            $eventUser = Attendee::updateOrCreate($eventUserFields);
            if($event->_id == "5ec3f3b6098c766b5c258df2"){
                $s = 0;
               
                for ($i=0; $i < 8; $i++){
                    //$eventUser = Attendee::create($eventUserFields);
        
                    $replicateeventuser = $eventUser->replicate();
                    $replicateeventuser->push();
                    if ($i%2==0){
                        $Ticket= Ticket::where("event_id", "5ec3f3b6098c766b5c258df2")->skip($s)->first();
                        $s++;
                        
                        //$eventUser->replicate();
                    }

                    $ticket_properties["ticket_id"] = $Ticket->_id;
                    $ticket_properties["ticket_title"] = $Ticket->title;
                    $replicateeventuser->fill($ticket_properties);
                    $replicateeventuser->save();
                        
                }
            }
        }
        \Log::debug($matchAttributes);
        \Log::debug($eventUserFields);
    
        /* Si viene el id de la orden en la variable eventUserFields
        buscamos la orden  */
        if (isset($eventUserFields["order_id"])) {
            $order->save();
        }

        $result_status = ($eventUser->wasRecentlyCreated) ? self::CREATED : self::UPDATED;

        //don't know why updateOrCreate doens't eager load related models
        $eventUser = Attendee::where($matchAttributes)->first();
        
        if(!empty($eventUserFields["eventuser_id"])){
            $eventUser = $eventUserFound;
        }

        $data = $eventUser;
        return (object) [
            "status" => $result_status,
            "data" => $data,
            "message" => $message,
        ];
    }
    /**
     * Undocumented function
     *
     * @param Event $event
     * @param [type] $EventusersIds
     * @return void
     */
    public static function addEventUsersToEvent(Event $event, $eventusersIds)
    {

        $eventAttendees = [];

        //cargamos varios Attendee por UserId.

        $eventUsers = Attendee::find($eventusersIds);

        
        foreach ($eventUsers as $eventUser) {

            if ($eventUser->event_id == $event->id) {
                $eventAttendees[] = $eventUser;
            } else {
                $newEventUser = $eventUser->replicate();
                $newEventUser->event_id = $event->id;
                $newEventUser->stated_id = Attendee::STATE_DRAFT;
                $newEventUser->save();
                $eventAttendees[] = $newEventUser;
                echo  " NuevoeventUser:>> ".$newEventUser->id." <<";
            }
        }

        return  $eventAttendees;

    }


    /**
     * Undocumented function
     *
     * @param Event $event
     * @param [type] $EventusersIds
     * @return void
     */
    public static function bookEventUsersToEvent(Event $event, $eventusersIds)
    {
        Log::debug("agregando");
        $eventAttendees = [];

        //cargamos varios Attendee por UserId.

        $eventUsers = Attendee::find($eventusersIds);

        foreach ($eventUsers as $eventUser) {
            Log::debug("eventUser: ".$eventUser->id);
            if ($eventUser->event_id == $event->id) {
                $newEventUser = $eventUser;
            } else {
                $newEventUser = $eventUser->replicate();
                $newEventUser->event_id = $event->id;
                echo  " NuevoeventUser:>> ".$newEventUser->id." <<";
            }

            $newEventUser->book()->save();
            $eventAttendees[] = $newEventUser;
        }

        return  $eventAttendees;

    }    

    /**
     * Add Users to an event in draft status
     *
     * @param Event       $event    Where users are going to be added
     * @param Array[Account] $usersIds Users to be added
     *
     * @return Attendee             eventUsers(attendees) added to the event
     */
    public static function addUsersToAnEvent(Event $event, $usersIds)
    {
        //cargamos varios Attendee por UserId.
        $eventUsers = Attendee::where('event_id', '=', $event->id)
            ->whereIn('account_id', $usersIds)
            ->get();

        $usersIdNotInEvent = self::getusersIdNotInEvent($eventUsers, $usersIds);

        foreach ($usersIdNotInEvent as $userId) {

            $user = Account::find($userId);
            if (!$user) {
                Log::debug('Account not found when trying to create. ' . $userId);
                continue;

            }
            Log::debug('Account not found when trying to create. ' . $userId);
            //Crear Attendee
            $eventUser = new Attendee;
            $eventUser->event_id = $event->id;
            $eventUser->account_id = $userId;
            $eventUser->properties = ["email" => $user->email, "name" => $user->name];

            $rol = Rol::where('level', 0)->first();
            $eventUser->rol_id = $rol->_id; 
            $eventUser->rol_id = "5afaf644500a7104f77189cd";

            $temp = State::first();
            $eventUser->state_id = $temp->_id;

            $eventUser->save();
            $eventUsers[] = $eventUser;
        }
        return $eventUsers;
    }

    private static function getusersIdNotInEvent($eventUsers, $usersIds)
    {
        $usersIdNotInEvent = array_filter($usersIds, function ($userId) use ($eventUsers) {
            $userIsInEvent = false;

            if (!$eventUsers || !count($eventUsers)) {
                return !$userIsInEvent;
            }

            foreach ($eventUsers as $eventUser) {
                if (isset($eventUser->account_id) && $eventUser->account_id == $userId) {
                    $userIsInEvent = true;
                }
            };
            return !$userIsInEvent;
        });

        return $usersIdNotInEvent;
    }

        /**
     * Store
     * 
     * | Body Params   |
     * | ------------- |
     * | @body $_POST[role_id] required field       |
     * | @body $_POST[event_id]  required field     |
     * | @body $_POST[model_id] required field      |  
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Contributors Resources
     */
    public static function saveRolUser($request)
    {
        return $request;
        $rol = $request;  

        //find or create user
        if (!isset($rol['model_id'])){
            if(isset($rol['properties'])){
                $email = $rol['properties']['email'];
                $matchAttributes = ['email' => $email];
                $user = Account::updateOrCreate($matchAttributes, $rol['properties']);
                $rol['model_id'] = $user->id;
            }else{
                throw new Exception("model_id and properties are mandatory", 1);                
            }
        }

        //add the user as contributor to the event with the specific rol
        $rol['model_type'] = "App\Account";
        $matchAttributesRol = [
         "role_id" => $rol['role_id'],
         "model_id" => $rol['model_id'],
         "event_id" => $rol["event_id"] 
        ];
        $model = ModelHasRole::updateOrCreate($matchAttributesRol, $rol);
        $response = new ModelHasRoleResource($model);
        return $response;
    }
}
