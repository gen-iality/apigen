<?php

namespace App\Http\Controllers;

use App\Account;
use App\Attendee;
use App\evaLib\Services\FilterQuery;
use App\evaLib\Services\UserEventService;
use App\Event;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\Message;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;
use Validator;

/**
 * @group EventUser
 * 
 *
 * Handles the relation bewteeen user and event.  It handles user booking into an event
 * Account relation to an event is one of the fundamental aspects of this platform
 * Most of the user functionality is executed under "Attendee" model and not directly under Account, because is an events platform.
 * 
 *
 * <p style="border: 1px solid #DDD">
 * Attendee has one user though user_id
 * <br> and one event though event_id
 * <br> This relation has states that represent the booking status of the user into the event
 * </p>
 * 
 */
class EventUserController extends Controller
{

    /**
     * _index_ display all the EventUsers of an event
     *
     * ORDERING PROBLEM WITH CAPITAL LETTERS
     * Collections must be created with case-insensitive default collation
     * 
     * Example: db.createCollection("names", { collation: { locale: 'en_US', strength: 1 } } )
     * https://docs.mongodb.com/manual/core/index-case-insensitive/
     * https://stackoverflow.com/questions/44682160/add-default-collation-to-existing-mongodb-collection
     * 
     * @queryParam filteredBy optional filter parameters Example: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]
     * 
     * @response {
     *     "_id": "5f9055454e6953792a54fd43",
     *     "state_id": "5b0efc411d18160bce9bc706",
     *     "checked_in": false,
     *     "rol_id": "5afaf644500a7104f77189cd",
     *     "properties": {
     *         "names": "Burke Maldonado",
     *         "email": "vygufiqe@mailinator.com",
     *         "password": null,
     *         "displayName": "Burke Maldonado"
     *     },
     *     "event_id": "5e9cae6bd74d5c2f5f0c61f2",
     *     "account_id": "5f9055454e6953792a54fd42",
     *     "updated_at": "2020-10-21 15:35:33",
     *     "created_at": "2020-10-21 15:35:33",
     *     "rol": null,
     *     "user": {
     *         "_id": "5f9055454e6953792a54fd42",
     *         "email": "vygufiqe@mailinator.com",
     *         "names": "Burke Maldonado",
     *         "displayName": "Burke Maldonado",
     *         "confirmation_code": "mSCaqtrRujVotLrG",
     *         "api_token": "gEXBxQHw5NW1BOjrC97If7stp9jODtpuLiW6MCeaZ45mUOMcfu20dJMwJedQ",
     *         "uid": "UOlROJM9hASVfUsbZofEubXrM5j2",
     *         "initial_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6IjBlM2FlZWUyYjVjMDhjMGMyODFhNGZmN2..",
     *         "refresh_token": "AG8BCndDGp2u4dbDaA0Q0QvfUfFCJd55iJoOrgJDr84lhXXpd4B34a2Bk8Y8UWl..",
     *         "updated_at": "2020-10-21 15:35:34",
     *         "created_at": "2020-10-21 15:35:33"
     *     },
     *     "ticket": null
     * }
     *
     * @return \Illuminate\Http\Response EventUserResource collection
     * @see App\evaLib\Services\FilterQuery::addDynamicQueryFiltersFromUrl() include dynamic conditions in the URl into the model query
     * 
     */

    public function index(Request $request, String $event_id, FilterQuery $filterQuery)
    {

        $input = $request->all();
        //arreglo temporal para Yanbal/landing/5f99a20378f48e50a571e3b6
        if ($event_id == "5f99a20378f48e50a571e3b6") {
            $input["pageSize"] = 2;
        }
        $query = Attendee::where("event_id", $event_id);
        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $input);
        return EventUserResource::collection($results);
    }
    
    /**
     * _meInEvent_: user information logged into the event
     * 
     * @urlParam event_id 
     * 
     * @param string $event_id
     * @return void
     */
    public function meInEvent($event_id)
    {
        $query = Attendee::where("event_id", $event_id)->where("account_id", auth()->user()->_id)->first();

        $results = $query->makeHidden(['activities', 'event']);
        return new EventUserResource($results);
    }

    /**
     * _meEvents:_ list of registered events of the logged in user.
     * 
     * 
     * @param \Illuminate\Http\Request  $request
     * @param  $event_id
     * @return EventUserResource
     */
    public function meEvents(Request $request)
    {
        $query = Attendee::with("event")->where("account_id", auth()->user()->_id)->get();
        $results = $query->makeHidden(['activities', 'event']);
        return EventUserResource::collection($results);
    }

    /**
     * _bookEventUsers_: book Event Users
     *
     * @param Request $request
     * @param Event $event
     * @return void
     */
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
     * _notifications_ : notifications
     * 
     * @urlParam evenUserId
     * 
     * @param Request $request
     * @param [type] $evenUserId
     * @return void
     */
    public function notifications(Request $request, $evenUserId)
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
     * _createUserViaUrl_: tries to create a new user from provided data and then add that user to specified event
     *  
     * 
     * @urlParam event_id string required
     * 
     * @bodyParam email email required 
     * @bodyParam name  string required
     * @bodyParam other_params,... any other params  will be saved in user and eventUser
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
        foreach ($datafromform["form_response"]['answers'] as $answer) {
            switch ($answer["field"]["id"]) {
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
                case "IHpvlVZ7J3MZ": //lugar de recogida esp
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
            'company' => $datafromform['company'],
            'empresa' => $datafromform['empresa'],
            'nombres' => $datafromform['names'],
            'names' => $datafromform['names'],
            'displayName' => $datafromform['names'],
            'language' => $language,
            'departinglocation' => $datafromform['departinglocation'],
            'lugarrecogida' => $datafromform['lugarrecogida'],
            'pais' => $datafromform['pais'],
            'country' => $datafromform['country'],
            'id' => $datafromform['id'],
            'identificacion' => $datafromform['identificacion'],
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
            foreach ($user_properties as $user_property) {

                if ($user_property['mandatory'] !== true) {
                    continue;
                }

                $field = $user_property['name'];
                //$validations[$field] = 'required';
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
        //Mail::to($email)
        //    ->send(
        //        new BookingConfirmed($result->data)
        //    );
        return "ok"; //$response;
    }

    /**
     * _sendQrToUsers_: send Qr To Users.
     * 
     * @urlParam event_id string required
     * 
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function sendQrToUsers(Request $request, string $event_id)
    {
        $eventUserData = $request->json()->all();
        $query = Attendee::where("event_id", $event_id)->get();

        $query = json_decode(json_encode($query), true);
        $emailsent = [];
        $i = 0;
        foreach ($query as $value) {
            $id = $value["_id"];
            $attendee = Attendee::find($id);
            //Mail::to($attendee->email)
            //    ->send(new BookingConfirmed($attendee));
            echo "<br> enviado a " . $attendee->email;
            array_push($emailsent, $attendee->email);
            $i++;
            // integrar RSVP con estas invitaciones a logearse
            // con registros
        }
        return $emailsent;
    }

    /**
     * _SubscribeUserToEventAndSendEmail_: register user to an event and send confirmation email
     * 
     * @urlParam event_id string required
     * 
     * @bodyParam email email required field 
     * @bodyParam name  string required
     * @bodyParam password  string required
     * @bodyParam other_params,... any other params  will be saved in user and eventUser
     * 
     * @param Request $request
     * @param string $event_id
     * @param Message $message
     * @param string $eventuser_id
     * @return void
     */
    public function SubscribeUserToEventAndSendEmail(Request $request, string $event_id, Message $message, string $eventuser_id = null)
    {
        $eventUserData = $request->json()->all();

        $noSendMail = $request->query('no_send_mail');

        $email = (isset($eventUserData["email"]) && $eventUserData["email"]) ? $eventUserData["email"] : null;
        if (!$email && isset($eventUserData["properties"]) && isset($eventUserData["properties"]["email"])) {
            $email = $eventUserData["properties"]["email"];
        }

        //El correo es super obligatorio para el registro
        if (!$email) {
            return abort(400, "Email is required");
        }

        $userexists = Attendee::where("event_id", $event_id)->where("properties.email", $email)->first();

        //if (!empty($userexists)) {
        //    return "El correo ingresado ya se encuentra registrado en el evento";
        //}

        $event = Event::findOrFail($event_id);
        $image = null; //$event->picture;

        $eventUser = self::createUserAndAddtoEvent($request, $event_id, $eventuser_id);
        //Esto queda raro porque la respuetas o es un usuario o es una respuesta HTTP

        if (get_class($eventUser) == "Illuminate\Http\Response" || get_class($eventUser) == "Illuminate\Http\JsonResponse") {
            return $eventUser;
        }

        // para probar rápido el correo lo renderiza como HTML más bien
        //return  (new RSVP("", $event, $response, $image, "", $event->name))->render();
        if ($noSendMail === 'true') {
            return $eventUser;
        }
        if ($event->send_custom_email) {
            Mail::to($email)
                ->queue(
                    //string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
                    new \App\Mail\InvitationMailSimple("", $event, $eventUser, $image, "", $event->name)
                );
            return $eventUser;
        }
        Mail::to($email)
            ->queue(
                //string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
                new \App\Mail\InvitationMail("", $event, $eventUser, $image, "", $event->name)
            );
        return $eventUser;

    }

    /**
     * _ChangeUserPassword_: change user password
     * 
     * @urlParam event_id string required
     * 
     * @bodyParam email email required Email of the user who will change his password
     * 
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function ChangeUserPassword(Request $request, string $event_id)
    {
        $data = $request->json()->all();
        $destination = $request->input("destination");
        $onlylink = $request->input("onlylink");

        //Validar si el usuario está registrado en el evento
        $email = (isset($data["email"]) && $data["email"]) ? $data["email"] : null;
        $eventUser = Attendee::where("event_id", $event_id)->where("properties.email", $email)->first();

        $event = Event::findOrFail($event_id);
        $image = null; //$event->picture;

        //En caso de que no exita el usuario se finaliza la función
            // if (empty($eventUser)){
            //    abort(401,"El correo ingresado no se encuentra registrado en el evento");
            // }
       
        //Envio de correo para la contraseña
        Mail::to($email)
            ->queue(
                //string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
                new \App\Mail\InvitationMail("", $event, $eventUser, $image, "", $event->name, null, null, null, true, $destination, $onlylink)
            );
        return $eventUser;

    }

    /**
     * _createUserAndAddtoEvent_:create user and add it to an event
     * 
     * @urlParam event_id string required
     * @urlParam eventuser_id  string      
     * 
     * @bodyParam email email required field 
     * @bodyParam name  string required
     * @bodyParam password string required
     * @bodyParam other_params,... any other params  will be saved in user and eventUser
     * 
     * @param Request $request
     * @param string $event_id
     * @param string $eventuser_id
     * @return void
     */
    public function createUserAndAddtoEvent(Request $request, string $event_id, string $eventuser_id = null)
    {
        try {
            //las propiedades dinámicas del usuario se estan migrando de una propiedad directa
            //a estar dentro de un hijo llamado properties

            $eventUserData = $request->json()->all();

            //$request->request->add(["ticket_id" => $eventUserData["properties"]["ticketid"]]);
            //$eventUserData = $request->json()->all();

            $field = Event::find($event_id);
            $user_properties = $field->user_properties;

            $userData = $request->json()->all();

            if (isset($eventUserData['properties'])) {
                $userData = $eventUserData['properties'];
                if (!empty($userData["password"]) && strlen($userData["password"]) < 6) {
                    return "minimun password length is 6 characters";
                }
            }
            $validations = [
                'email' => 'required|email',
                //'other_fields' => 'sometimes',
            ];

            if (!empty($eventUserData["ticketid"])) {
                //$eventUserData["ticket_id"] = $eventUserData["properties"]["ticketid"];
                $eventUserData["ticket_id"] = $eventUserData["ticketid"];
                $userData["ticket_id"] = $eventUserData["ticketid"];
                //$userData["ticket_id"] = $eventUserData["properties"]["ticketid"];
                //$userData["ticket_id"]["properties"] = $eventUserData["properties"]["ticketid"];
                //var_dump($userData);die;\

            }

            if (!empty($eventUserData["ticketid"])) {

                $eventUserData["ticket_id"] = $eventUserData["ticketid"];
                $userData["ticket_id"] = $eventUserData["ticketid"];
                unset($eventUserData["ticketid"]);
                unset($userData["ticketid"]);

            } elseif (!empty($eventUserData["properties"]["ticketid"])) {

                $eventUserData["ticket_id"] = $eventUserData["properties"]["ticketid"];
                $userData["ticket_id"] = $eventUserData["properties"]["ticketid"];
                unset($eventUserData["properties"]["ticketid"]);
                unset($userData["properties"]["ticketid"]);

            }

            foreach ($user_properties as $user_property) {

                if ($user_property['mandatory'] !== true || $user_property['type'] == "tituloseccion") {
                    continue;
                }

                $field = $user_property['name'];
                //$validations[$field] = 'required';
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
            if ($eventuser_id) {
                $eventUserData["eventuser_id"] = $eventuser_id;
            }

            $result = UserEventService::importUserEvent($event, $eventUserData, $userData);
            $eventUser = $result->data;

            /**
             *
             *Creamos un token para que se pueda autologuear el usuario
             **/
            $auth = resolve('Kreait\Firebase\Auth');
            $signInResult = null;

            //
            //try {
            //     if (isset($eventUser->user->refresh_token)) {
            //         $signInResult = $auth->signInWithRefreshToken($eventUser->user->refresh_token);
            //     }
            // } catch (\Exception $e) {
            //     if (get_class($e) == "Kreait\Firebase\Auth\SignIn\FailedToSignIn") {
            //     } else {
            //         return response()->json((object) ["message" => $e->getMessage()], 400);
            //     }
            // }

            if (!$signInResult) {
                $pass = (isset($userData["password"])) ? $userData["password"] : "evius.2040";

                if (isset($eventUser->user->uid)) {
                    $updatedUser = $auth->changeUserPassword($eventUser->user->uid, $pass);

                    $signInResult = $auth->signInWithEmailAndPassword($eventUser->user->email, $pass);

                    $eventUser->user->refresh_token = $signInResult->refreshToken();
                    $eventUser->user->save();
                }
            }

            if ($signInResult && $signInResult->accessToken()) {
                //throw new Exception($outter_message . ' and new token could not be generated');
                $eventUser->user->initial_token = $signInResult->accessToken();
            }

            $response = new EventUserResource($eventUser);

            $additional = ['status' => $result->status, 'message' => $result->message];
            $response->additional($additional);

        } catch (\Exception $e) {
            var_dump(get_class($e));
            echo "fin";
            var_dump($e->getMessage());die;
            return response()->json((object) ["message" => $e->getMessage()], 400);

        }
        return $response;
    }

    /**
     * _testCreateUserAndAddtoEvent_: test Create User And Add to Event
     * 
     * @urlParam event_id string required
     * 
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function testCreateUserAndAddtoEvent(Request $request, string $event_id)
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
            foreach ($user_properties as $user_property) {

                if ($user_property['mandatory'] !== true) {
                    continue;
                }

                $field = $user_property['name'];
                //$validations[$field] = 'required';
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

            if (!empty($eventUserData["rol_id"])) {
                $rol = $response["user"]["rol_id"];
                $response->rol()->attach($rol);
            }

            $response->additional(['status' => $result->status, 'message' => $result->message]);

        } catch (\Exception $e) {

            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }
        //return $response;
    }

    /**
     * _indexByEventUser_: list of events by logged in user
     *
     * @param Request $request
     * @return void
     */
    public function indexByEventUser(Request $request)
    {
        $events = Attendee::with("event")->where("account_id", auth()->user()->_id)->get();
        $events_id = [];
        foreach ($events as $key => $value) {
            array_push($events_id, $value["event_id"]);
        }
        return Event::find($events_id);
    }

    /**
     * _ByUserInEvent_ : list of users by events
     * 
     * @urlParam event_id string required
     *
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function ByUserInEvent(Request $request, $event_id)
    {
        return EventUserResource::collection(
            Attendee::where("event_id", $event_id)->where("account_id", auth()->user()->_id)->paginate(config("app.page_size"))
        );
    }
    /**
     * _indexByUserInEvent_: list of users by events
     * 
     * @urlParam event_id string required
     * 
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function indexByUserInEvent(Request $request, $event_id)
    {
        $user = auth()->user();
        //truco si no viene el usuario para que no se rompa.
        if (!$user) {
            return EventUserResource::collection(Attendee::where("event_id", "-1")->paginate(config("app.page_size")));
        }

        return EventUserResource::collection(
            Attendee::where("event_id", $event_id)->where("account_id", auth()->user()->_id)->paginate(config("app.page_size"))
        );
    }

    /**
     * _searchInEvent_: search user within the event to verify if you are registered
     *
     * @urlParam event_id string required
     * 
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function searchInEvent(Request $request, $event_id)
    {
        $auth = resolve('Kreait\Firebase\Auth');

        $email = ($request->email) ? $request->email : $request->input("email");
        $password = $request->password;
        $check = !empty($email) ? Account::where("email", $email)->first() : null;

        if (!is_null($check)) {
            $user["nombres"] = ($check->properties["names"]) ? $check->properties["names"] : $check->properties["displayName"];
            $user["id"] = $check->id;
            $user["status"] = "Usuario existente en el evento";
            try {
                $user["account_response"] = $auth->getUserByEmail($email);

            } catch (Exception $e) {
                $user["account_response"] = "usuario existe en base de datos pero no tiene login a evius";
            }
            return $user;
        }
        return "Usuario no encontrado";

    }

    /**
     * _store:_ Store a newly Attendee  in storage.
     * 
     * @urlParam event_id required
     * 
     * @bodyParam user_id string required user id      
     * @bodyParam properties array other params  will be saved in user and eventUser each event can require aditional properties for registration
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
     * _show:_ consult an EventUser by assistant id
     * 
     * @urlParam event_id string required
     * @urlParam id string required id Attendee
     * 
     * @param  \App\Attendee  $eventUser
     * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $event_id, $id)
    {
        $eventUser = Attendee::findOrFail($id);
        return new EventUserResource($eventUser);
    }

    /**
     * _update_:update a specific assistant
     *
     * @urlParam event_id string required
     * @urlParam evenUserId string required id de Attendee
     * 
     * @bodyParam email email required field 
     * @bodyParam name  string required
     * @bodyParam other_params,... any other params  will be saved in user and eventUser
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendee  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = Attendee::findOrFail($evenUserId);
        $eventUser->fill($data);
        $eventUser->save();
        return $eventUser;
    }

    /**
     * _updateWithStatus_: update With Status
     * 
     * @urlParam event_id string required
     *
     * @param Request $request
     * @param [type] $evenUserId
     * @return void
     */
    public function updateWithStatus(Request $request, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = Attendee::findOrFail($evenUserId);

        if (empty($data['properties'])) {
            $data['properties'] = $data;
        }
        $new_properties = $data['properties'];
        $old_properties = $eventUser->properties;
        $properties_merge = array_merge($old_properties, $new_properties);

        $data['properties'] = $properties_merge;
        $eventUser->fill($data);
        $eventUser->save();

        $response = new EventUserResource($eventUser);
        $response->additional(['status' => UserEventService::UPDATED, 'message' => UserEventService::MESSAGE]);
        return $response;
    }

    /**
     * __CheckIn:__ checks In an existent Attendee to the related event
     *  
     * @urlParam id string required id Attendee to checkin into the event
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
     * __delete:__ remove a specific attendee from an event.
     * 
     * @urlParam eventId string required
     * @urlParam id string required id Attendee to checkin into the event
     * 
     * @param  \App\Attendee  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $eventId, $eventUserId)
    {
        $attendee = Attendee::findOrFail($eventUserId);
        return (string) $attendee->delete();
    }

    //nunca usar usar otras alternativas si es posible
    public function destroyAll($eventUser)
    {
        $attende = Account::where("email", 'like', '%@coomeva%')->forceDelete();
        die;
        $attende = json_decode(json_encode($attende), true);

        foreach ($attende as $att) {

            $attende = Attendee::find($att["_id"]);

            echo $attende->forceDelete();
        }

    }

    /**
     * _transferEventuserAndEnrollToActivity_ : transfer Eventuser And Enroll To Activity
     *
     * @param Request $request
     * @param string $event_id
     * @param string $eventuser_id
     * @param Message $message
     * @return void
     */
    public function transferEventuserAndEnrollToActivity(Request $request, $event_id, $eventuser_id, Message $message)
    {
        //$event_user = Attendee::find($eventuser_id);

        $data = $request->json()->all();

        return $user_invited = self::SubscribeUserToEventAndSendEmail($request, $event_id, $message, $eventuser_id);

        //if (empty($user_invited->_id)){
        //    $user_invited = Attendee::where("event_id",$event_id)->where("properties.email", $data["properties"]["email"])->first();
        //}

        //$activity = new ActivityAssistantController();
        //$activity->activitieAssistant($request,$event_id);

        return $user_invited;

        return "usuario no encontrado, o sin invitaciones disponibles";
    }

}
