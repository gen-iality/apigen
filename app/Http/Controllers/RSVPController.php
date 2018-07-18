<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\State;
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


    public function sendEventRSVP(Request $request, Event $event, State $state, GoogleFiles $gfService)
    {
        //$request->all();
        $message = $request->input('message');
        
        $image = $gfService->storeFile($request->file('image'));
        //$id->fill($data);
        //$id->save();        
        var_dump($message);
        var_dump($image);
        //por cada envio de RSVP se tiene que validar que se enviaron los correos
        //actualizando el estado del RSVP
        //
        //http://localhost/eviusapilaravel/public/api/rsvp/sendeventrsvp/5b1060b20d4ed40e93533af3/5b188b41c4004d12ec13d139

        //$users = self::getEventUsers($event, $state);
        //self::sendRSVPmail($users, $message, $image,$event) ;
        $users = [];
        return count($users);
    }

    /**
     * Undocumented function
     *
     * @param [type] $users
     * @return void
     */
    private static function sendRSVPmail($users, $event,$image)
    {
        foreach ($users as &$user) {
            var_dump($user->email);
            Mail::to($user->email)
            ->cc('juan.lopez@mocionsoft.com')
            ->send(new RSVP($event, $user));
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
        if ($state->id) {
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
