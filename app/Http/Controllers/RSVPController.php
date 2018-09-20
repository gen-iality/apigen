<?php
/**
 * @package App\EventInvitations
 */
namespace App\Http\Controllers;

use App\evaLib\Services\UserEventService;
use App\Event;
use App\EventUser;
use App\Mail\RSVP;
use App\Message;
use App\MessageUser;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

/**
 * @resource RSVP Handle RSVP(invitations for events)
 *
 */
class RSVPController extends Controller
{

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
        return RSVP::where('author', $request->get('user')->uid)->get();
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
        $eventUsers = UserEventService::addEventUsersToEvent($event, $eventUsersIds);
        //var_dump($eventUsers);
        //Send RSVP
        self::_sendRSVPmail(
            $eventUsers, $message, $event
        );
        $mesage = $message->fresh();

        return $message;
    }

/**
 * saveRSVP
 *
 * @param [type] $message
 * @param [type] $subject
 * @param [type] $image
 * @param [type] $footer
 * @param [type] $usersCount
 * @param [type] $eventId
 * @return void
 */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messageUser = MessageUser::create($request->all());
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

        foreach ($eventUsers as &$eventUser) {

            

            if (!$eventUser || !isset($eventUser->user)) {
                $usuariolog = (isset($eventUser)) ? $eventUser->toJson() : "";
                \Log::debug("This eventUser doesn't have any assosiated user" . $usuariolog);
                continue;
            }

            $eventUser->changeToInvite();

            //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
            $email = (isset($eventUser->user->email)) ? $eventUser->user->email : "juan.lopez@mocionsoft.com";

            $messageUser = new MessageUser(
                [
                    'email' => $eventUser->user->email,
                    'user_id' => $eventUser->user->id,
                    'event_user_id' => $eventUser->id,
                ]
            );
            $message->messageUsers()->save($messageUser);

            $m = Message::find($message->id);
            
            Mail::to($email)->send(new RSVP($message->message, $event, $eventUser, $message->image, $message->footer, $message->subject));

            //->cc('juan.lopez@mocionsoft.com');
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function confirmRSVP(EventUser $eventUser)
    {
        if (!$eventUser->confirm()->save()) {
            App::abort(500, 'Error');
        }
        return redirect()->away('http://dev.mocionsoft.com:3000/evento/' . $eventUser->event_id . '');
        // return ['id'=>$eventUser->id,'message'=>'Confirmed'];

    }

    private static function getEventUsersByState($event, $state)
    {
        $condiciones = [['event_id', '=', $event->id]];

        //Agregamos la condicion por estado si es que viene
        if ($state && $state != "null" && $state->id) {
            $condiciones[] = ['state_id', '=', $state->id];
        }

        $evtUsers = EventUser::where($condiciones)->get();

        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $auth = $firebase->getAuth();

        $usersfilter = function ($data) use ($auth) {
            $temporal = (object) [];

            try {
                $user = $auth->getUser($data->userid);
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
