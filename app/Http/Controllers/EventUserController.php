<?php

namespace App\Http\Controllers;

use App\evaLib\Services\FilterQuery;
use App\evaLib\Services\UserEventService;
use App\Event;
use App\EventUser;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

/**
 * @resource EventUser (Attendee)
 *
 * Handles the relation bewteeen user and event.  It handles user booking into an event
 * User relation to an event is one of the fundamental aspects of this platform
 * most of the user functionality is executed under "EventUser" model and not directly
 * under User, because is an events platform.
 * @see App\Http\Requests\EventUserRequest for parameters validation
 *
 * @see App\Http\Requests\EventUserRequest for parameters validation
 *
 * <p style="border: 1px solid #DDD">
 * EventUser has one user though user_id
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
        $query = EventUser::where("event_id", $event_id);

        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $request);

        return EventUserResource::collection($results);
    }

    public function meEvents(Request $request)
    {
       
        $user = $request->get('user');

        $query   = EventUser::with("event")->where("userid", $user->id);
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
    public function createUserAndAddtoEvent(Request $request, string $event_id)
    {
        try {

            //las propiedades dinamicas del usuario se estan migrando de una propiedad directa
            //a estar dentro de un hijo llamado properties
            $eventUserData = $request->json()->all();

            $userData = $request->json()->all();
            if (isset($eventUserData['properties'])) {
                $userData = $eventUserData['properties'];
            }

            //este validador pronto se va a su clase de validacion
            $validator = Validator::make(
                $userData, [
                    'email' => 'required|email',
                    'name' => 'required',
                    'other_fields' => 'sometimes',
                ]
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

    public function index(Request $request)
    {
        return EventUserResource::collection(
            EventUser::paginate(config('app.page_size'))
        );
    }

    /**
     * __Store:__ Store a newly EventUser  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventUser = EventUser::create($request->json()->all());
        return new EventUserResource($eventUser);
    }

    /**
     * __Show:__ Display an EventUser by id
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventUser = EventUser::findOrFail($id);
        return new EventUserResource($eventUser);
    }

    /**
     * __Update:__ Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = EventUser::findOrFail($evenUserId);
        $eventUser->fill($data);
        $eventUser->save();
        return $eventUser;
    }
    public function updateWithStatus(Request $request, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = EventUser::findOrFail($evenUserId);
        $eventUser->fill($data);
        $eventUser->save();

        $response = new EventUserResource($eventUser);
        $response->additional(['status' => UserEventService::UPDATED, 'message' => UserEventService::MESSAGE]);

        return $response;
    }

    /**
     * __CheckIn:__ Checks In an existent EventUser to the related event
     *
     * @param  string $id EventUser to checkin into the event
     * @return void
     */
    public function checkIn($id)
    {
        $eventUser = EventUser::findOrFail($id);      
        return $eventUser->checkIn();
    }

    /**
     * __delete:__ Remove the specified resource from storage.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventUser $eventUser)
    {
        return $eventUser->delete();
    }
}
