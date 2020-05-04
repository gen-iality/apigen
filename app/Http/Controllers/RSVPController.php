<?php
/**
 * @package App\EventInvitations
 */
namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
use App\Mail\RSVP;
use App\Message;
use App\MessageUser;
use App\State;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Redirect;

/**
 * @resource RSVP Handle RSVP(invitations for events)
 *
 */
class RSVPController extends Controller implements ShouldQueue
{

    public function __construct(\Kreait\Firebase\Auth $auth)
    {
        $this->auth = $auth;
    }

    public function test()
    {
        echo "hola";
        echo Config::get('app.front_url', 'aaa');
        $actionCodeSettings = ['url' => 'http://localhost:3000/linklogin?email=esteban.sanchez@mocionsoft.com',
            'handleCodeInApp' => false,
            //'dynamicLinkDomain' => 'evius.co'
        ];

        // Admin SDK API to generate the sign in with email link.
        $usremail = 'esteban.sanchez@mocionsoft.com';
        $link = $this->auth->getSignInWithEmailLink($usremail, $actionCodeSettings);
        echo "<p>" . $link . "</p>";
    }

    public function singIn(Request $request)
    {

        $actionCodeSettings = ['handleCodeInApp' => false];
        $link = $this->auth->getSignInWithEmailLink($request->input("email"), $actionCodeSettings);

        $innerpath = ($request->has("innerpath")) ? $request->input("innerpath") : "";

        $parts = parse_url($link);
        parse_str($parts['query'], $query);

        $signInResult = $this->auth->signInWithEmailAndOobCode($request->input("email"), $query['oobCode']);

        return Redirect::to("https://evius.co/" . $innerpath . "?token=" . $signInResult->idToken());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //return response()->json(Event::all());
        //return Event::all();
        return RSVP::where('author', $request->get('user')->id)->get();
    }

    /**
     * Send RSVP to users in an event, taking usersIds[] in
     * request to filter which users the RSVP is going to be send to
     *
     *      +@@post body usersIds[]
     *      +@@post body message
     *      +@@post body image link
     *      +@@post body subject
     *      +@@post body footer
     *      +@body message asdfasdf
     *
     * @param request Laravel request object
     * @param Event $event  Event to which users are suscribed
     * @param Message $message auto injected
     * @return int Number of email sent
     */

    public function createAndSendRSVP(Request $request, Event $event, Message $message)
    {
        $data = $request->json()->all();
        $data["message"] = $data["message"] == "" || $data["message"] == null ? "  " : $data["message"];
        //Si esto no existe que?
        $eventUsersIds = $data['eventUsersIds'];
        //~~~~~~~~~~~~~~~~~~~~~~
        //Create RSVP
        $subject = $data['subject'];
        $subject = ($subject) ? $subject : "[Invitación] " . $event->name;
        $message->subject = $subject;

        $message->message = $data['message'];
        $message->footer = isset($data['footer']) ? $data['footer'] : "";

        // $image   = "https://storage.googleapis.com/herba-images/evius/events/8KOZm7ZxYVst444wIK7V9tuELDRTRwqDUUDAnWzK.png";

        $message->image = isset($data['image']) ? $data['image'] : "";
        $message->event_id = $event->id;
        $message->number_of_recipients = count($eventUsersIds);
        $message->save();
        //~~~~~~~~~~~~~~~~~~~~~~
        //addUsers - recipients of message
        //https://stackoverflow.com/questions/33005815/laravel-5-retrieve-json-array-from-request
        //$eventUsers = UserEventService::addUsersToAnEvent($event, $eventUsersIds);
        //$eventUsers = UserEventService::addEventUsersToEvent($event, $eventUsersIds);

        $eventUsers = Attendee::find($eventUsersIds);

        $message->number_of_recipients = count($eventUsers);
        $message->save();

        //Generar link de única autnticación

        //var_dump($eventUsers);
        //Send RSVP
        self::_sendRSVPmail(
            $eventUsers, $message, $event
        );
        $mesage = $message->fresh();

        return $message;
    }

    /**
     * Store a newly created resource in storage.
     *
     * saveRSVP
     *
     * @param [type] $message
     * @param [type] $subject
     * @param [type] $image
     * @param [type] $footer
     * @param [type] $usersCount
     * @param [type] $eventId
     * @return void
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messageUser = MessageUser::create($request->json()->all());
        return new MessageUserResource($book);
    }

    /**
     * Undocumented function
     *
     * @param [type] $eventUsers
     * @param [type] $message
     * @return void
     */
    private static function _sendRSVPmail($eventUsers, $message, $event)
    {
        \Log::debug("attemp to send rsvp mail" . $message->subject);

        foreach ($eventUsers as &$eventUser) {

            $eventUser->changeToInvite();

            //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
            $email = (isset($eventUser->email)) ? $eventUser->email : $eventUser->properties["email"];

            $messageUser = new MessageUser(
                [
                    'email' => $eventUser->email,
                    'user_id' => $eventUser->id,
                    'event_user_id' => $eventUser->id,
                ]
            );
            $message->messageUsers()->save($messageUser);

            $m = Message::find($message->id);

            Mail::to($email)
                ->queue(
                    new RSVP($message->message, $event, $eventUser, $message->image, $message->footer, $message->subject)
                );

            //->cc('juan.lopez@mocionsoft.com');
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function confirmRSVP(Attendee $eventUser)
    {
        if (!$eventUser->confirm()->save()) {
            App::abort(500, 'Error');
        }

        return redirect()->away(Config::get('app.front_url', 'https://evius.co') . '/landing/' . $eventUser->event_id . "?attendee=" . $eventUser->_id . '&status=' . $eventUser->state_id);
        // return ['id'=>$eventUser->id,'message'=>'Confirmed'];

    }

    public function confirmRSVPTest(Attendee $eventUser)
    {
        if (!$eventUser->confirm()->save()) {
            App::abort(500, 'Error');
        }
        return $eventUser;
        // return ['id'=>$eventUser->id,'message'=>'Confirmed'];

    }

    private static function getEventUsersByState($event, $state)
    {
        $condiciones = [['event_id', '=', $event->id]];

        //Agregamos la condicion por estado si es que viene
        if ($state && $state != "null" && $state->id) {
            $condiciones[] = ['state_id', '=', $state->id];
        }

        $evtUsers = Attendee::where($condiciones)->get();

        $auth = resolve('Kreait\Firebase\Auth');

        $usersfilter = function ($data) use ($auth) {
            $temporal = (object) [];

            try {
                $user = $auth->getUser($data->account_id);
            } catch (\Exception $e) {
                echo ($e->getMessage());
                $user = false;
            }
            if ($user) {
                $temporal = $data;
                $temporal->user = $user;
                $temporal->rol_id = $data->rol;
                $temporal->state_id = $data->state;
                $temporal->email = $user->email;

                return $temporal;
            }
        };

        $users = array_map($usersfilter, $evtUsers->all());

        return $users;
    }
}