<?php

namespace App\Http\Controllers;

use App\evaLib\Services\UserEventService;
use App\Event;
use App\EventUser;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
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
 *
 *
 */
class EventUserController extends Controller
{

    public function test($id)
    {
        $eventUser = EventUser::find($id);

        return ["a" => $eventUser->getAttributes()];
    }

    /**
     * __index:__ Display all the EventUsers of an event
     *
     * response  EventUser of specific event
     * it could be filtered by
     *    +'state_id'
     *    +'rol_id'
     * @param [type] $event_id
     *
     * @return \Illuminate\Http\Response EventUserResource collection
     *
     * PROBLEMA ORDENAMIENTO CON mayusculas
     * Se tiene que crear las colecciones con collation por defecto insensitiva a mayusculas
     * EJemplo: db.createCollection("names", { collation: { locale: 'en_US', strength: 1 } } )
     * https://docs.mongodb.com/manual/core/index-case-insensitive/
     * https://stackoverflow.com/questions/44682160/add-default-collation-to-existing-mongodb-collection
     */
    public function index(Request $request, String $event_id)
    {
        $query = EventUser::where("event_id", $event_id);

        //páginacion pordefecto
        $pageSize = (int) $request->input('pageSize');
        $pageSize = ($pageSize) ? $pageSize : 25;

        $filteredBy = json_decode($request->input('filtered'));
        $filteredBy = is_array($filteredBy) ? $filteredBy : [$filteredBy];

        $orderedBy = json_decode($request->input('orderBy'));
        $orderedBy = is_array($orderedBy) ? $orderedBy : [$orderedBy];

        foreach ((array) $filteredBy as $condition) {
            if (!$condition || !isset($condition->id) || !isset($condition->value)) {
                continue;
            }

            //for any eventUser inner properties enable text like partial search by default is the most common use case
            if (strpos($condition->id, 'properties.') === 0) {
                $condition->comparator = "like";
            }

            //if like comparator is stated add partial search using %% symbols
            $comparator = (isset($condition->comparator)) ? $condition->comparator : "=";
            if (strtolower($comparator) == "like") {
                $condition->value = "%" . $condition->value . "%";
            }

            $query->where($condition->id, $comparator, $condition->value);
        }

        foreach ((array) $orderedBy as $order) {

            if (!isset($order->id)) {
                continue;
            }

            $direccion = (isset($order->order) && $order->order) ? $order->order : "desc";
            $query->orderBy($order->id, $direccion);

        }

        /* Test to select only few columns
        $users = $query->get();
        $subset = $users->map(function ($user) {
            return collect($user->toArray())
                ->only(['properties'])
                ->all();
        });

        return $subset;*/

        return EventUserResource::collection(
            $query->paginate($pageSize)
        );
    }

    public function bookEventUsers(Request $request, Event $event)
    {
        try {

            $eventUsersIds = $data['eventUsersIds'];
            $eventUsers = UserEventService::bookEventUsersToEvent($event, $eventUsersIds);
            $response = new EventUserResource($eventUsers);
            //$response->additional(['status' => $result->status, 'message' => $result->message]);
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

            //las propiedades del usuario se estan migrando de una propiedad directa
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

    /**
     * __Store:__ Store a newly EventUser  in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EventUserResource::withoutWrapping();
        $eventUser = EventUser::create($request->all());
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
        /*
        $usersfilter = function ($data) {
        $temporal = $data;
        $temporal->user = User::where('uid', $data->userid)->first();
        $temporal->state_id = $data->state;
        $temporal->rol_id = $data->rol;

        return $temporal;
        };
         */

        $eventUser = EventUser::find($id);

        $response = new EventUserResource($eventUser);
        return $response;
    }

    /**
     * __Update:__ Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventUser $eventUser)
    {
        Log::debug("model created");
        $data = $request->all();
        $eventUser->fill($data);
        $eventUser->save();
        return $eventUser;
    }

    /**
     * __CheckIn:__ Checks In an existent EventUser to the related event
     *
     * @param  string $id EventUser to checkin into the event
     * @return void
     */
    public function checkIn($id)
    {
        Log::debug("model ");
        $eventUser = EventUser::find($id);
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
