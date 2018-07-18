<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\State;
use App\Message;
use App\Event;
use App\EventUser;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Mail;
use App\Mail\RSVP;
use Storage;
use App\evaLib\Services\GoogleFiles;

/**
 * @resource RSVP
 * Handle RSVP(invitations for events)
 *
 */
class RSVPController extends Controller
{

    /**
     * Send RSVP to users in an event, taking EventUser status as parameter
     * to filter which users the RSVP is going to be send to
     *
     * @param Event $event  Event to which users are suscribed
     * @param State $state (optional) EventUser state to filter which users are going to get the RSVP
     * @return int Number of email sent
     */


    public function sendEventRSVP(Request $request, Event $event, State $state, GoogleFiles $gfService, Message $messageDB)
    {
        //$request->all();
        $message = $request->input('message');
        // $image   = "https://storage.googleapis.com/herba-images/evius/events/8KOZm7ZxYVst444wIK7V9tuELDRTRwqDUUDAnWzK.png";
        $image   = $request->input('image');
        $subject = "[Invitación]".$event->name;
        //$image = $gfService->storeFile($request->file('image'));
        //$id->fill($data);
        //$id->save();        
        //por cada envio de RSVP se tiene que validar que se enviaron los correos
        //actualizando el estado del RSVP
        //
        //http://localhost/eviusapilaravel/public/api/rsvp/sendeventrsvp/5b1060b20d4ed40e93533af3/5b188b41c4004d12ec13d139

        $users = self::getEventUsers($event, $state);
        self::sendRSVPmail($users, $message, $image,$event,$subject) ;
        $usersCount = count($users);
        $eventId = $event->id;

        $this->saveRSVP($message, $subject, $image, $usersCount, $eventId, $state->name, $messageDB);

        return $usersCount;
    }

    /**
     * Undocumented function
     *
     * @param [type] $users
     * @return void
     */
    public static function saveRSVP($message, $subject, $image, $usersCount, $eventId, $state, $messageDB){
                //@START Save message
                var_dump($message, $subject, $image, $usersCount, $eventId, $state);
                $messageDB->message =  $message;
                $messageDB->subject =  $subject;
                $messageDB->image =  $image;
                $messageDB->recipients_filter_field =  "status";
                $messageDB->recipients_filter_value =  ($state)? $state: null;
                $messageDB->sent =  $usersCount;
                $messageDB->success =  $usersCount;
                $messageDB->failed =  0;
                $messageDB->event_id =  $eventId;
                $messageDB->save();
                //@END save message
    }

    private static function sendRSVPmail($users, $message, $image,$event,$subject)
    {
        
        foreach ($users as &$user) {
            if (!$user)continue;
            
            $eventUser = EventUser::where('user_id',$user->id)->where('event_id',$event->id)->first();
            echo "user_id: ".$user->id;
            $eventUser->changeToInvite()->save();
            

            Mail::to($user->email)
            ->cc('juan.lopez@mocionsoft.com')
            ->send(new RSVP($message, $event, $user, $image,$subject));

            
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
        //return redirect()->away('https://bbc.com');
        return ['id'=>$eventUser->id,'message'=>'Confirmed'];

    }


    private static function getEventUsers($event, $state)
    {
        $condiciones = [['event_id', '=', $event->id]];
        
        //Agregamos la condicion por estado si es que viene
        if ($state && $state->id) {
            $condiciones[] = ['state_id', '=', $state->id];
        }
       
        $evtUsers = EventUser::where($condiciones)->get();

        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $auth = $firebase->getAuth();

        $usersfilter = function ($data) use ($auth) {
            $temporal = (object)[];

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
