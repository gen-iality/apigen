<?php
/**
 * @package App\EventInvitations
 */
namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
use App\Mail\RSVP;
use App\Mail\wallActivity;
use App\Message;
use App\MessageUser;
use App\MessageUserUpdate;
use App\State;
use GuzzleHttp\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Log;

/**
 * @group RSVP
 * Handle RSVP(invitations for events)
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
        if ($request->input("request")) {

            $data["response"] = $request->input("response");

            $url = config('app.api_evius') . '/events/' . $innerpath . '/acceptordecline/' . $request->input("request");
            $client = new Client();
            try {
                $response = $client->request('PUT', $url, [
                    'body' => json_encode($data),
                    'headers' => ['Content-Type' => 'application/json'],
                ]);
            } catch (\ClientErrorResponseException $e) {

            }
        }

        $parts = parse_url($link);
        parse_str($parts['query'], $query);

        $signInResult = $this->auth->signInWithEmailAndOobCode($request->input("email"), $query['oobCode']);

        return Redirect::to(config('app.front_url')."/" . "landing/" . $innerpath . "?token=" . $signInResult->idToken());
    }

    /**
     **  notificaciones al correo por actividad en el muro
     **/
    public function wallActivity(Request $request, String $event_id)
    {
        $data = $request->json()->all();

        if ($data["type"] == "post") {
            $eventUsers = Attendee::where("event_id", $event_id)->get();
            $user_sender = Attendee::find($data["user_sender_id"]);

            foreach ($eventUsers as $event_user) {
                $user_receiver = $event_user;
                Mail::to($user_receiver->properties["email"])->queue(
                    new wallActivity($data, $event_id, $user_sender, $user_receiver)
                );

            }

        } elseif ($data["type"] == "comment") {

            $user_sender = Attendee::find($data["user_sender_id"]);
            $user_receiver = Attendee::find($data["user_receiver_id"]);
            return Mail::to($user_receiver->properties["email"])->queue(
                new wallActivity($data, $event_id, $user_sender, $user_receiver)
            );
        }
        //Mail::to($email)->queue(
        //    new wallActivity($data,$event_id)
        //);

    }

    /**
     * _index_: Display a listing of the RSVP.
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
     * _createAndSendRSVP_: send RSVP to users in an event, taking eventUsersIds[] in request to filter which users the RSVP is going to be send to
     * 
     * @autenticathed
     * 
     * @urlParam event required
     * 
     * @bodyParam subject string required mail subject Evento virtual Ucronio     
     * @bodyParam image_header string  imagen header 
     * @bodyParam content_header string Example: Has sido invitado a el evento
     * @bodyParam message string message that will go in the body of the mail 
     * @bodyParam image string image that will go in the body of the mail       
     * @bodyParam image_footer string image footer     
     * @bodyParam eventUsersIds[] array required id of users to whom the mail will be sent Example: "eventUsersIds": ["5f8734c81730821f216b6202"]
     * @bodyParam include_ical_calendar boolean field used to show(true) or not(false) the top calendar in the mailing Example: false
     * @bodyParam include_login_button boolean field used to show (true) or not (false) the event entry button Example : false
     *
     * @param request Laravel request object
     * @param Event $event  Event to which users are suscribed
     * @param Message $message auto injected
     * @return int Number of email sent
    */
    public function createAndSendRSVP(Request $request, Event $event, Message $message)
    {
        $data = $request->json()->all();
        if($data['eventUsersIds'] === 'all')
        {               
            $query = Attendee::where("event_id", $event->_id)->pluck('_id')->toArray();
            $data['eventUsersIds'] = $query;
        }
        
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

        $eventUsers = Attendee::find($eventUsersIds)->unique("account_id");
        $message->number_of_recipients = count($eventUsers);
        $message->save();

        //var_dump($eventUsers);
        //Send RSVP
        self::_sendRSVPmail(
            $eventUsers, $message, $event, $data
        );

        return $message;
    }

    /**
     * _store_:Store a newly created resource in RSVP.
     *
     * @bodyParam $message
     * @bodyParam $subject
     * @bodyParam $image
     * @bodyParam $footer
     * @bodyParam $usersCount
     * @bodyParam $eventId

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
    private static function _sendRSVPmail($eventUsers, $message, $event, $data = null)
    {
        \Log::debug("attemp to send rsvp mail" . $message->subject);

        

        foreach ($eventUsers as &$eventUser) {
            Log::info('foreach');
            $eventUser->changeToInvite();

            //se puso aqui esto porque algunos usuarios se borraron es para que las pruebas no fallen
            $email = (isset($eventUser->email)) ? $eventUser->email : $eventUser->properties["email"];

            $messageUser = new MessageUser([
                'email' => $eventUser->email,
                'user_id' => $eventUser->id,
                'event_user_id' => $eventUser->id,
            ]
            );
            
            // $message->messageUsers()->save($messageUser);

            $messageLog = Message::find($message->id);
            $image_header = !empty($data["image_header"]) ? $data["image_header"] : null;
            $image_footer = !empty($data["image_footer"]) ? $data["image_footer"] : null;
            $content_header = !empty($data["content_header"]) ? $data["content_header"] : null;

            $include_date = false;
            if (!empty($data["include_date"])) {
                $include_date = $data["include_date"] ? true : false;
            }

            $data["include_ical_calendar"] = isset($data["include_ical_calendar"]) ? $data["include_ical_calendar"]  : true; 
            $data["include_login_button"] = isset($data["include_login_button"]) ? $data["include_login_button"]  : true;            

            echo "a";
            // sino existe la propiedad names lo más posible es que el usuario tenga un error
            if (!isset($eventUser->user) || !isset($eventUser->user->uid)  || !isset($eventUser->properties) || !isset($eventUser->properties["names"])) {
                continue;
            }
            
           
            Mail::to($email)
                ->queue(
                    new RSVP($data["message"], $event, $eventUser, $message->image, $message->footer, $message->subject, $image_header, $content_header, $image_footer, $include_date, $data, $messageLog)
                );
                
            Log::info('$mail '.$email);    
 
        }
    }

    /**
     * _confirmRSVP_: Confirmation de RSVP
     * @urlParam eventUser required
     *
     * @Ireturn void
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

    /**
     * 
     */
    public function updateStatusMessageUser($event_id ,$message_id)
    {

        //consulta del registro de mensaje por usuario
        $messageUsers = MessageUser::where('message_id', '=', $message_id);
        $messageUsersPluck =  $messageUsers->pluck('email');

        $messageUserUpdate = MessageUserUpdate::whereIn('notification_id', $messageUsersPluck)->orderby('created_at','DESC')->get;
        // $messageUserUpdatePluck = $messageUserUpdate->pluck('email_destinations');

        // var_dump($messageUsersPluck);
        // var_dump($messageUserUpdatePluck);die;

        // return $messageUserUpdate;
        //
        $message = Message::find($message_id);


        //Se recorre messageUser para buscar el ultimo estado en MessageUserUpdate y actualizarlo
        foreach($messageUsers as $messageUser ){

            $messageUserUpdate = MessageUserUpdate::where('notification_id', '=', $messageUser->server_message_id)->orderby('created_at','DESC')->first();            
            $messageUser->status_message = $messageUserUpdate->status_message;
            $messageUser->status = $messageUserUpdate->status_message;
            // $messageUser->save();
            
        } 
        // return $message;


        $total_delivered = MessageUser::where('status_message', '=', 'Delivery')->where('message_id', '=', $message_id)->get();
        $total_delivered = isset($total_delivered) ? count($total_delivered) : 0;
        $message->total_delivered = $total_delivered;
        
        $total_bounced = MessageUser::where('status_message', '=', 'Bounce')->where('message_id', '=', $message_id)->get();
        $total_bounced = isset($total_bounced) ? count($total_bounced) : 0;
        $message->total_bounced = $total_bounced;

        $total_sent = MessageUser::where('status_message', '=', 'Send')->where('message_id', '=', $message_id)->get();
        $total_sent = isset($total_sent) ? count($total_sent) : 0;
        $message->total_sent = $total_sent;

        $total_opened = MessageUser::where('status_message', '=', 'Open')->where('message_id', '=', $message_id)->get();
        $total_opened = isset($total_opened) ? count($total_opened) : 0;
        $message->total_opened = $total_opened;

        $total_clicked = MessageUser::where('status_message', '=', 'Click')->where('message_id', '=', $message_id)->get();
        $total_clicked = isset($total_clicked) ? count($total_clicked) : 0;
        $message->total_clicked = $total_clicked;

        $message->save();
        return  response()->json([
                    'message' => 'Status actualizado exitosamente'
                ]); 
    }
}