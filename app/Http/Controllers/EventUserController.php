<?php

namespace App\Http\Controllers;

use App\Account;
use App\Attendee;
use App\evaLib\Services\FilterQuery;
use App\evaLib\Services\UpdateRolEventUserAndSendEmail;
use App\evaLib\Services\UserEventService;
use App\Event;
use App\Http\Resources\EventUserResource;
use App\Message;
use App\State;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Log;
use Mail;
use Validator;
use Carbon\Carbon;
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
     * @queryParam filtered optional filter parameters Example: [{"id":"event_type_id","value":["5bb21557af7ea71be746e98x","5bb21557af7ea71be746e98b"]}]
     *
     * @response {
     *     "_id": "5f9055454e6953792a54fd43",
     *     "state_id": "5b0efc411d18160bce9bc706",
     *     "checked_in": false,
     *     "rol_id": "60e8a7e74f9fb74ccd00dc22",
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

        //Se buscan usuarios existentes con el correo que se está ingresando
        $userexists = Attendee::where("event_id", $event_id)->where("properties.email", $email)->first();

        //Se valida si ya hay un usuario con el correo que se está ingresando
        if (empty($userexists)) {
            //Si es el primer registro de usuario al evento se toma la fecha del registro con formato 2021-01-01
            $date = \Carbon\Carbon::now()->format('Y-m-d');

            //Se llama al método que registra la cantidad de registros a un evento por día
            app('App\Http\Controllers\RegistrationMetricsController')->createByDay($date, $event_id);
        }

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

     
        Mail::to($email)
        ->queue(
            //string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
            new \App\Mail\InvitationMailSimple("", $event, $eventUser, $image, "", $event->name)
        );

        if ($event_id == '61a8443fa3023d1c117f9e13') {
            $hubspot = self::hubspotRegister($request, $event_id, $event);
        }

        return $eventUser;

    }

    /**
     * _changeUserPassword_: change user password
     *
     * @urlParam event_id required string id of the event in which the user is registered
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
        $firebasePasswordChange = $request->input("firebase_password_change");

        //Validar si el usuario está registrado en el evento
        $email = (isset($data["email"]) && $data["email"]) ? $data["email"] : null;
        $eventUser = Attendee::where("event_id", $event_id)->where("properties.email", $email)->first();

        $event = Event::findOrFail($event_id);
        $image = null; //$event->picture;

        //En caso de que no exita el usuario se finaliza la función
        if (empty($eventUser)) {
            abort(401, "El correo ingresado no se encuentra registrado en el evento");
        }
        if ($firebasePasswordChange) {
            $client = new Client();
            $url = "https://www.googleapis.com/identitytoolkit/v3/relyingparty/getOobConfirmationCode?key=AIzaSyATmdx489awEXPhT8dhTv4eQzX3JW308vc";
            $headers = ['Content-Type' => 'application/json'];

            $request = $client->post($url,
                [
                    'json' => [
                        "requestType" => "PASSWORD_RESET",
                        "email" => $email,
                    ],
                ],
                ['headers' => $headers]
            );
        } else {
            //Envio de correo para la contraseña
            Mail::to($email)
                ->queue(
                    //string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
                    new \App\Mail\InvitationMail("", $event, $eventUser, $image, "", $event->name, null, null, null, true, $destination, $onlylink, $firebasePasswordChange)
                );
        }
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
            // $userData["password"] =self::encryptdata($userData["password"]);
            
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

            //Si el usuario ya se ha logueado generamos un token a partir de su refresh_token
            // try {
            //     if (isset($eventUser->user->refresh_token)) {
            //         $signInResult = $auth->signInWithRefreshToken($eventUser->user->refresh_token);
            //     }

            // } catch (\Exception $e) {

            //     if (get_class($e) == "Kreait\Firebase\Auth\SignIn\FailedToSignIn") {
            //     } else {
            //         //return response()->json((object) ["message" => $e->getMessage()], 400);
            //     }
            // }

            if (!$signInResult) {
                $pass = (isset($userData["password"])) ? $userData["password"] : $userData["email"];

                //No conocemos otra forma de generar el token de login sino forzando un signin
                if (isset($eventUser->user->uid)) {

                    $updatedUser = $auth->changeUserPassword($eventUser->user->uid, $pass);
                    $signInResult = $auth->signInWithEmailAndPassword($eventUser->user->email, $pass);
                    $eventUser->user->refresh_token = $signInResult->refreshToken();
                    $eventUser->user->save();
                }
            }

            if ($signInResult && $signInResult->accessToken()) {
                $eventUser->user->initial_token = $signInResult->accessToken();
            } else if ($signInResult && $signInResult->idToken()) {
                $eventUser->user->initial_token = $signInResult->idToken();
            }
            $eventUser->email = strtolower($eventUser->email);
            $eventUser->save();
            $response = new EventUserResource($eventUser);
            $additional = ['status' => $result->status, 'message' => $result->message];
            $response->additional($additional);

            if($event->sendregistrationnotification)
            {
                
                Mail::to($userData["email"])
                ->queue(
                    //string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
                    new \App\Mail\InvitationMailSimple("", $event, $eventUser, $image = null, "", $event->name)
                );
            }
            
        } catch (\Exception $e) {
            return response()->json((object) ["message" => $e->getMessage()], 400);

        }
        return $response;
    }


    private function encryptdata($string)
    {

        // Store the cipher method
        $ciphering = "AES-128-CTR"; //config(app.chiper);

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = config('app.encryption_iv');

        // Store the encryption key
        $encryption_key = config('app.encryption_key');

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($string, $ciphering,
            $encryption_key, $options, $encryption_iv);

        // Display the encrypted string
        return $encryption;
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
            Attendee::where("event_id", $event_id)->
            where(function ($query) {
                $query->where("account_id", auth()->user()->_id)
                //Temporal fix for users that got different case in their email and thus firebase created different user
                      ->orWhere('email', '=', strtolower(auth()->user()->email));
            })->paginate(config("app.page_size"))
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
     * @bodyParam account_id string required user id
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
     * @urlParam event string required
     * @urlParam eventusers string required id de Attendee
     *
     * @bodyParam email email  field
     * @bodyParam name  string field
     * @bodyParam rol_id string rol id this is the role user into event 
     * @bodyParam properties. any other params  will be saved in user and eventUser.
     *
     */
    public function update(Request $request, $event_id, $evenUserId)
    {
        $data = $request->json()->all();
        $eventUser = Attendee::findOrFail($evenUserId);

        $new_properties = isset($data['properties']) ? $data['properties'] : [];
        $old_properties = isset($eventUser->properties) ? $eventUser->properties : [];

        $properties_merge = array_merge($old_properties, $new_properties);

        $data['properties'] = $properties_merge;

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
        if (!isset($eventUser->checkedin_at) && ($eventUser->checkedin_at !== false)) {
            $eventUser->checkIn();
        }

        $printoutsHistory = [];
        $eventUser->printouts = $eventUser->printouts + 1;
        $eventUser->printouts_at = \Carbon\Carbon::now();

        $dataCheckIn = [
            'printouts' => $eventUser->printouts,
            'printouts_at' => $eventUser->printouts_at->format('Y-m-d H:i:s'),
        ];

        if (is_null($eventUser->printouts_history)) {

            $eventUser->printouts_history = array($dataCheckIn);
        } else {
            $array = $eventUser->printouts_history;
            array_push($array, $dataCheckIn);
            $eventUser->printouts_history = $array;
        }

        $eventUser->save();

        return $eventUser;
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
        Log::info("Anulando suscrpción del usuario  " . $attendee->account_id . " del evento " . $eventId);
        return (string) $attendee->delete();
    }

    //nunca usar usar otras alternativas si es posible
    public function destroyAll($eventUser, Request $request)
    {
        $email = $request->json('emails');
        $attendes = Attendee::whereIn('properties.email', $email)->where('event_id', $eventUser)
            ->delete();

        $account = Account::whereIn('email', $email)->delete();
        return $account;

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

    /**
     *
     */
    public function unsubscribe($event_id, $event_user_id)
    {
        $eventUser = Attendee::find($event_user_id);
        if (isset($eventUser)) {
            Log::info("Anulando suscrpción del usuario  " . $eventUser->account_id . " del evento " . $event_id);
            $eventUser->delete();
        }
        return view('ManageUser.unsubscribe');
    }

    /**
     * _totalMetricsByEvent_
     * @autenticathed
     *
     * @urlParam event_id
     *
     */
    public function totalMetricsByEvent(request $request, $event_id)
    {
        $data = $request->input();

        $attendes = Attendee::where('event_id', $event_id);

        if (isset($data['datetime_from']) && isset($data['datetime_to'])) {
            $attendes = $attendes->whereBetween(
                'created_at',
                array(
                    \Carbon\Carbon::parse($data['datetime_from']),
                    \Carbon\Carbon::parse($data['datetime_to']),
                )
            );
        }
        //1.Total de registros en el evento
        $attendesTotal = $attendes->count();

        //3.Visitias únicas totales
        $checkIn = $attendes->where('checked_in', '!=', false)->count();

        //2.Impresiones por evento
        $totalPrintouts = 0;
        $printouts = $attendes->where('printouts', '>', 0)->pluck('printouts');
        foreach ($printouts as $printout) {
            $totalPrintouts = $totalPrintouts + $printout;
        }

        return response()->json([
            'total_users' => $attendesTotal,
            'total_checkIn' => $checkIn,
            'total_printouts' => $totalPrintouts,
        ]);

    }

    /**
     *
     */
    public function hubspotRegister(Request $request, $event_id, $event)
    {
        $eventUserData = $request->json()->all();

        $client = new Client();
        $url = "https://api.hubapi.com/contacts/v1/contact/?hapikey=e4f2017c-357e-4f2f-99d1-0dd3929f61e0";

        $arr = array(
            'properties' => array(
                array(
                    'property' => 'firstname',
                    'value' => $eventUserData['properties']['names'],
                ),
                array(
                    'property' => 'email',
                    'value' => $eventUserData['properties']['email'],
                ),
                array(
                    'property' => 'lastname',
                    'value' => $eventUserData['properties']['apellidos'],
                ),
                array(
                    'property' => 'mobilephone',
                    'value' => $eventUserData['properties']['numerodetelefonomovil'],
                ),
                array(
                    'property' => 'company',
                    'value' => isset($eventUserData['properties']['nombredelaempresa']) ? $eventUserData['properties']['nombredelaempresa'] : "",
                ),
                array(
                    'property' => 'cedula_de_ciudadania_nit',
                    'value' => isset($eventUserData['properties']['nodecedula']) ?$eventUserData['properties']['nodecedula'] : "" ,
                ),
                array(
                    'property' => 'rol_cargo',
                    'value' => isset($eventUserData['properties']['rolcargo']) ? $eventUserData['properties']['rolcargo'] : "",
                ),
            ),
        );        

        $response = null;
        try{
            $response = $client->request('POST', $url, [
                'body' => json_encode($arr),
                'headers' => ['Content-Type' => 'application/json'],
            ]);
        }
        catch(\Exception $e){

        }
        return $response;
    }

    /**
     * _metricsEventByDate_: number of registered users and checked in for day according to event start and end dates 
     * or according specific dates.
     * 
     * @urlParam event required event_id
     * @queryParam metrics_type required string With this parameter you can defined the type of metrics that you want to see, you can select created_at for see the registered users  or checkedin_at for see checked users. Example: created_at
     * @queryParam datetime_from date
     * @queryParam datetime_from date
     */
    public function metricsEventByDate(Request $request, $event_id)
    {

        $data = $request->input();
        $event = Event::findOrFail($event_id);

        $dateFrom = isset($data['datetime_from']) ? $data['datetime_from'] : $event->datetime_from;
        $dateTo = isset($data['datetime_to'])? $data['datetime_to'] : $event->datetime_to;

        //Se realiza esta conversión a fecha: 2021-08-30 00:00
        $dateFrom = Carbon::parse($dateFrom)->format('Y-m-d H:i');
        $dateTo = Carbon::parse($dateTo)->format('Y-m-d H:i');

        $attendees = Attendee::where('event_id', $event_id)
            ->whereBetween(
                $data['metrics_type'],
                array(
                    //Aquí también se hace la conversión o no funciona
                    Carbon::parse($dateFrom),
                    Carbon::parse($dateTo),
                )
            )
            ->get([$data['metrics_type']]);
       
        // Se pueden consultar los registros y el checkIn, ambos aquí porque tienen la misam estructura de la consulta
        switch ($data['metrics_type']) {
            case "created_at";
                $attendees = $attendees->groupBy(function ($date) {
                    return \Carbon\Carbon::parse($date->created_at)->format('Y-m-d');
                });
                break;
            case "checkedin_at";
                $attendees = $attendees->groupBy(function ($date) {
                    return \Carbon\Carbon::parse($date->checkedin_at)->format('Y-m-d');
                });
                break;
        }

        //Este array forma un json con la fecha y la cantidad de registro o checkIn
        $totalForDate = [];
        foreach ($attendees as $key => $attendee) {

            $count = count($attendee);
            $response = response()->json([
                'date' => $key,
                'quantity' => $count,
            ]);

            array_push($totalForDate, $response->original);
        }

        return $totalForDate;

    }

    /**
     * _updateRolAndSendEmail_: change the rol of an user in a event especific.
     * This end point sends an email to the user to inform them of the change.
     * @authenticated
     *
     * @urlParam event required
     * @urlParam eventuser required
     *
     * @bodyParam rol_id string required
     */
    public function updateRolAndSendEmail(Request $request, $event_id, $eventUser_id)
    {
        return UpdateRolEventUserAndSendEmail::UpdateRolEventUserAndSendEmail($request, $event_id, $eventUser_id);
    }
}
