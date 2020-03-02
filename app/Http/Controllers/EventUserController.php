<?php

namespace App\Http\Controllers;

use QRCode;
use Validator;
use Mail;
use PDF;
use App\Event;
use App\State;
use App\Account;
use App\Attendee;
use App\ActivityAssistants;
use App\Mail\BookingConfirmed;
use Illuminate\Http\Request;
use App\Http\Controllers\EventAttendeesController;
use Illuminate\Http\Response;
use App\evaLib\Services\FilterQuery;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\evaLib\Services\UserEventService;
use App\Jobs\SendAttendeeTicket;


/**
 * @resource Attendee (Attendee)
 *
 * Handles the relation bewteeen user and event.  It handles user booking into an event
 * Account relation to an event is one of the fundamental aspects of this platform
 * most of the user functionality is executed under "Attendee" model and not directly
 * under Account, because is an events platform.
 * @see App\Http\Requests\EventUserRequest for parameters validation
 *
 * @see App\Http\Requests\EventUserRequest for parameters validation
 *
 * <p style="border: 1px solid #DDD">
 * Attendee has one user though user_id
 * <br> and one event though event_id
 * <br> This relation has states that represent the booking status of the user into the event
 * </p>
 */
class EventUserController extends Controller
{

    /**
     * __index:__ Display all the EventUsers of an event
     *
     * this methods allows dynamic quering by any property via URL using the services FilterQuery.
     * Exmaple:
     *  - ?filteredBy=[{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]
     * @see App\evaLib\Services\FilterQuery::addDynamicQueryFiltersFromUrl() include dynamic conditions in the URl into the model query
     *
     *
     * PROBLEMA ORDENAMIENTO CON mayusculas
     * Se tiene que crear las colecciones con collation por defecto insensitiva a mayusculas
     * EJemplo: db.createCollection("names", { collation: { locale: 'en_US', strength: 1 } } )
     * https://docs.mongodb.com/manual/core/index-case-insensitive/
     * https://stackoverflow.com/questions/44682160/add-default-collation-to-existing-mongodb-collection
     * 
     *  @return \Illuminate\Http\Response EventUserResource collection
     */
    public function indexByEvent(Request $request, String $event_id, FilterQuery $filterQuery)
    {
        $query = Attendee::where("event_id", $event_id);

        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $request);

        return EventUserResource::collection($results);
    }

    public function meEvents(Request $request)
    {
       
        $user = $request->get('user');

        $query   = Attendee::with("event")->where("account_id", $user->id);
        $results = $query->paginate(config('app.page_size'));
        return EventUserResource::collection($results);
    }    



    public function bookEventUsers(Request $request, Event $event)
    {
        try {
            $data = $request->json()->all();

            $eventUsersIds = $data['eventUsersIds'];

            $eventUsers = UserEventService::bookEventUsersToEvent($event, $eventUsersIds);

            //$response = EventUserResource::collection($eventUsers);
            /* $response->additional(['status' => $result->status, 'message' => $result->message]);
             */
            $response = ["msg" => "users booked " . count($eventUsers)];
        } catch (\Exception $e) {

            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }
        return $response;
    }

    public function notifications(Request $request, $evenUserId){
    
        $data = $request->json()->all();
        $eventUser = Attendee::findOrFail($evenUserId);
        $eventUser->fill($data);
        $eventUser->save();

        $response = new EventUserResource($eventUser);
        $response->additional(['status' => UserEventService::UPDATED, 'message' => UserEventService::MESSAGE]);
        return $response;
   


    }

        /**
     * __CreateUserAndAddtoEvent:__ Tries to create a new user from provided data and then add that user to specified event
     *
     * | Body Params   |
     * | ------------- |
     * | @body $_POST[email] required field |
     * | @body $_POST[name]     |
     * | @body $_POST[other_params],... any other params  will be saved in user and eventUser
     *
     * @param Request $request HTTP request
     * @param String  $event_id to add the user to.
     *
     * @return EventUserResource
     */

    public function createUserViaUrl(Request $request, string $event_id)    
    {
      //  data-route="https://api.evius.co/es/event/order/5d712f33d74d5c2aef354aa6/resend"
    //EventAttendeesController::postResendTicketToAttendee($datafromform, $event_id);
    
    $datafromform = $request->json()->all();
    $language = $request->input("language");
    $datafromform["language"] = $language;
        foreach ($datafromform["form_response"]['answers'] as $answer){
            switch($answer["field"]["id"]){
                case "UHEADSVyhrBQ": 
                case "fqVfNrgrLJEb": 
                    $datafromform['names'] = $answer[$answer["type"]];
                
                break;
                case "EiX4qlYKpQWl":
                case "rnlJ8qb0LrBZ":
                    $datafromform['email'] = $answer[$answer["type"]];
                    $datafromform['correo'] = $answer[$answer["type"]];
                    break;
                case "bQx4x4U4qhn6": //id esp
                case "vXMjPZAvAzex":
                    $datafromform['id'] = strval($answer[$answer["type"]]);
                    $datafromform['identificacion'] = strval($answer[$answer["type"]]);
                    break;
                case "jmqQSTlF0JR4": //pais esp
                case "H0WzcAI63WBQ":
                    $datafromform['pais'] = strval($answer[$answer["type"]]);
                    $datafromform['country'] = strval($answer[$answer["type"]]);
                    break;
                case "aKdpmUbcqAur": //lugar de recogida esp
                case "qDxlVBBAZRuz":
                    $datafromform['lugarrecogida'] = strval($answer["choice"]["label"]);
                    $datafromform['departinglocation'] = strval($answer["choice"]["label"]);
                    break;
                case "nRPaTjeZABs0":
                case "tvQOBq0hlycC":
                    $datafromform['company'] = strval($answer[$answer["type"]]);
                    $datafromform['empresa'] = strval($answer[$answer["type"]]);
                
                    break;
                case "YZmj5yyJ5xu6":
                case "GmbrPQhNPJId":
                    $datafromform['charge'] = $answer[$answer["type"]];
                    $datafromform['cargo'] = $answer[$answer["type"]];
                    break;
            }
        
            }   
        $datafromform['properties'] = [
            'charge' => $datafromform['charge'],
            'cargo' => $datafromform['cargo'],
            'email' => $datafromform['email'],
            'correo' => $datafromform['correo'],
            'company' =>  $datafromform['company'],
            'empresa' =>  $datafromform['empresa'],
            'nombres' => $datafromform['names'],
            'language' => $language,
            'departinglocation' => $datafromform['departinglocation'],
            'lugarrecogida' => $datafromform['lugarrecogida'],
            'pais' => $datafromform['pais'] ,
            'country' => $datafromform['country'] ,
            'id' => $datafromform['id'],
            'identificacion' => $datafromform['identificacion'] 
        ];

        
        try {
            //las propiedades dinamicas del usuario se estan migrando de una propiedad directa
            //a estar dentro de un hijo llamado properties
            
            $field = Event::find($event_id);
            $user_properties = $field->user_properties;

            $userData = $datafromform;

            if (isset($datafromform['properties'])) {
                $userData = $datafromform['properties'];
            }
            $validations = [
                'email' => 'required|email',
                'other_fields' => 'sometimes',
            ];
            foreach ($user_properties as $user_property){

                if($user_property['mandatory'] !== true)continue;
                    $field = $user_property['name'];
                    $validations [$field] = 'required';
                }

            //este validador pronto se va a su clase de validacion
            $validator = Validator::make(
                $userData,
                $validations
            );

            if ($validator->fails()) {
                return response(
                    $validator->errors(),
                    422
                );
            }
        
            $event = Event::find($event_id);
            $result = UserEventService::importUserEvent($event, $userData, $userData);
            
            $response = new EventUserResource($result->data);
            
            $response->additional(['status' => $result->status, 'message' => $result->message]);
        } catch (\Exception $e) {

            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }
        $email = $datafromform['email'];
         Mail::to($email)
         ->send(
             new BookingConfirmed($result->data)
         );
         return "ok";//$response;
    }

    public function sendQrToUsers(Request $request, string $event_id)
    {
        $eventUserData = $request->json()->all();
        $query = Attendee::where("event_id", $event_id)->get();
    
        $query = json_decode(json_encode($query),true);
        $emailsent = [];
        $i = 0;
        foreach ($query as $value) {
            $id = $value["_id"];
            $attendee = Attendee::find($id);
           if($i>249 && $i<300){
            Mail::to($attendee->email)
            ->send(new BookingConfirmed($attendee));
            echo "<br> enviado a " .$attendee->email;
            array_push($emailsent,$attendee->email);
           }
           $i++;
        }
        return $emailsent;
    }
    public function createUserAndAddtoEvent(Request $request, string $event_id)
    {
        try {
            //las propiedades dinamicas del usuario se estan migrando de una propiedad directa
            //a estar dentro de un hijo llamado properties
            $eventUserData = $request->json()->all();

            $field = Event::find($event_id);
            $user_properties = $field->user_properties;

            $userData = $request->json()->all();

            if (isset($eventUserData['properties'])) {
                $userData = $eventUserData['properties'];
            }
            $validations = [
                'email' => 'required|email',
                'other_fields' => 'sometimes',
            ];
            foreach ($user_properties as $user_property){

                if($user_property['mandatory'] !== true)continue;
                    $field = $user_property['name'];
                    $validations [$field] = 'required';
                }

            //este validador pronto se va a su clase de validacion
            $validator = Validator::make(
                $userData, 
                $validations
            );

            if ($validator->fails()) {
                return response(
                    $validator->errors(),
                    422
                );
            }
            
            $event = Event::find($event_id);
            $result = UserEventService::importUserEvent($event, $eventUserData, $userData);
            
            $response = new EventUserResource($result->data);
            $response->additional(['status' => $result->status, 'message' => $result->message]);
        } catch (\Exception $e) {

            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }
        return $response;
    }


    public function index(Request $request,$event_id)
    {
        return EventUserResource::collection(
            Attendee::where('event_id',$event_id)->paginate(config("app.page_size"))
        );
    }

    /**
     * __Store:__ Store a newly Attendee  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventUser = Attendee::create($request->json()->all());
        return new EventUserResource($eventUser);
    }

    /**
     * __Show:__ Display an Attendee by id
     *
     * @param  \App\Attendee  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        $eventUser = Attendee::findOrFail($id);
        return new EventUserResource($eventUser);
    }
   
    /**
     * __Update:__ Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendee  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = Attendee::findOrFail($evenUserId);
        $eventUser->fill($data);
        $eventUser->save();
        return $eventUser;
    }

    public function updateWithStatus(Request $request, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = Attendee::findOrFail($evenUserId);
        $eventUser->fill($data);
        $eventUser->save();

        $response = new EventUserResource($eventUser);
        $response->additional(['status' => UserEventService::UPDATED, 'message' => UserEventService::MESSAGE]);
        return $response;
    }

    /**
     * __CheckIn:__ Checks In an existent Attendee to the related event
     *
     * @param  string $id Attendee to checkin into the event
     * @return void
     */
    public function checkIn($id)
    {
        $eventUser = Attendee::findOrFail($id);      
        return $eventUser->checkIn();
    }

    /**
     * __delete:__ Remove the specified resource from storage.
     *
     * @param  \App\Attendee  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee $eventUser)
    {
        return $eventUser->delete();
    }

    public function destroyAll( $eventUser)
    {
        $attende = Account::where("email",'like', '%@coomeva%')->forceDelete();
        die;
        $attende = json_decode(json_encode($attende),true);
     
        foreach( $attende as $att ){
             
            $attende = Attendee::find($att["_id"]);      
                
           echo $attende->forceDelete();
            
        }

    }
    public function changeEventId(Request $request, $event_id_old, $event_id_new)
    {
        $attendees = Attendee::where("event_id",$event_id_old)->get();
        $attendees = json_decode(json_encode($attendees),true);
        foreach ($attendees as $value) {
            //echo  var_dump($value);
            $user = Attendee::find($value["_id"]);
            $newid["event_id"] = $event_id_new;
            echo var_dump($newid)."<br>";
            $user->fill($newid);
            $user->save();
            
        }

    }

}
