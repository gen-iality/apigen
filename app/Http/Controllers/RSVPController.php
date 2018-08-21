<?php
/**
 * @package App\EventInvitations
 */
namespace App\Http\Controllers;

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
     ** @post body usersIds[]
     *+     @post body message
     *     + @@post body image link
     * *   @post body subject
     * *   @post body footer
     *     * @body message asdfasdf
     *      *
     * ```javascript
     * var s = "JavaScript syntax highlighting";
     * alert(s);
     * ```
     * ---
     * ___
     * ***
     * <b> funciona </p>
     *
     *
     *     post asdf asdfasd
     * @get asdf sadf
     * @url huy huy
     * @header param asdfa s     *
     *
     * @param request Laravel request object
     * @param Event $event  Event to which users are suscribed
     * @param Message $messageDB auto injected
     * @return int Number of email sent
     *

     */

    public function sendEventRSVP(Request $request, Event $event, Message $messageDB)
    {
        //https://stackoverflow.com/questions/33005815/laravel-5-retrieve-json-array-from-request
        //los usuarios
        $usersIds = $request->input('usersIds');

        $message = $request->input('message');
        // $image   = "https://storage.googleapis.com/herba-images/evius/events/8KOZm7ZxYVst444wIK7V9tuELDRTRwqDUUDAnWzK.png";
        $image = $request->input('image');
        $subject = $request->input('subject');
        $subject = ($subject) ? $subject : "[Invitación] " . $event->name;
        $footer = $request->input('footer') || "";

        $eventUsers = self::getOrCreateEventUserFromUsers($event, $usersIds);

        self::_sendRSVPmail($eventUsers, $message, $image, $footer, $event, $subject);
        $usersCount = count($eventUsers);

        return $usersCount;
    }

    private static function getOrCreateEventUserFromUsers($event, $usersIds)
    {
        //cargamos varios usuarios por id.
        $eventUsers = EventUser::where('event_id', '=', $event->id)
            ->whereIn('userid', $usersIds)
            ->get();

        foreach ($eventUsers as $eventUser) {
            $usuario = User::firstOrCreate(["uid" => $eventUser->userid]);
        }

        $usersIdNotInEvent = self::getusersIdNotInEvent($eventUsers, $usersIds);

        foreach ($usersIdNotInEvent as $userId) {
            //Crear EventUser
            $eventUser = new EventUser;
            $eventUser->event_id = $event->id;
            $eventUser->userid = $userId;
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
                if (isset($eventUser->userid) && $eventUser->userid == $userId) {
                    $userIsInEvent = true;
                }
            };
            return !$userIsInEvent;
        });

        return $usersIdNotInEvent;
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
    public static function saveRSVP($message, $subject, $image,
        $footer, $usersCount, $eventId
    ) {
        //@START Save message
        $messageDB = new Message();
        $messageDB->message = $message;
        $messageDB->footer = $footer;
        $messageDB->subject = $subject;
        $messageDB->image = $image;
        $messageDB->recipients_filter_field = "status";
        $messageDB->recipients_filter_value = null;
        $messageDB->sent = $usersCount;
        $messageDB->success = $usersCount;
        $messageDB->failed = 0;
        $messageDB->event_id = $eventId;
        $messageDB->save();
        //@END save message
        return $messageDB;
    }

    private static function _sendRSVPmail(
        $eventUsers, $message, $image, $footer, $event, $subject
    ) {
        $usersCount = count($eventUsers);

        $message = self::saveRSVP($message, $subject, $image, $footer,
            $usersCount, $event->id
        );

        foreach ($eventUsers as &$eventUser) {
            if (!$eventUser) {
                continue;
            }

            $eventUser->changeToInvite();

            //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
            $email = (!empty($eventUser->user->email)) ? $eventUser->user->email : "juan.lopez@mocionsoft.com";

            $messageUser = new MessageUser(
                [
                    'email' => $eventUser->user->email,
                    'user_id' => $eventUser->user->uid,
                    'event_user_id' => $eventUser->id,
                ]
            );
            $message->messageUsers()->save($messageUser);

            $m = Message::find($message->id);

            foreach ($m->messageUsers as $mu) {
                var_dump($mu->email);
            }
            // Mail::to($email)->send(new RSVP($message, $event, $eventUser, $image, $footer, $subject));
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

    private static function getEventUsers($eventUsersId)
    {

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
