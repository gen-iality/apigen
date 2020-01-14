<?php

namespace App\Http\Controllers;

use App\SendContent;
use App\Event;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Morrislaptop\Firestore\Factory;
use Kreait\Firebase\ServiceAccount;
use Mail;
use PDF;
use Storage;

/**
 * @resource Event
 *
 *
 */
class SendContentController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new SendContent();
    var_dump($a->getTable());
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return JsonResource::collection(
            SendContent::paginate(config('app.page_size'))
        );
        //$events = Event::where('visibility', $request->input('name'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $result = new SendContent($data);
        $result->save();
        return $result;

    }
    public function delete($id)
    {
        $res = $id->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        } $pdf = PDF::loadview('Public.ViewEvent.Partials.certificate', $data);
        $pdf->setPaper( 'letter',  'landscape' );
        return $pdf->download('Tickets.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\SendContent  $SendContent
     * @return \Illuminate\Http\Response
     */
    public function show(string $event_id, string $id)
    {
      
        $SendContent = SendContent::findOrFail($id);
        $response = new JsonResource($SendContent);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SendContent  $SendContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $event_id, string $id)
    {
        $data = $request->json()->all();
        $SendContent = SendContent::findOrFail($id);
        $SendContent->fill($data);
        $SendContent->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,string $event_id, string $id)
    {
        $SendContent = SendContent::findOrFail($id);
        return (string) $SendContent->delete();

    }

    public function indexByEvent(Request $request, String $event_id)
    {
        $query = SendContent::where("event_id", $event_id);
        $results = $query->get();
        return JsonResource::collection($results);
    }

    public function sendContentGenerated(Request $request)
    {
     
        
        $data = $request->json()->all();
        
        $data_single = $data["email"];
       
                
            Mail::send("Public.ViewEvent.Partials.ContentMail",$data , function ($message) use ($data,$data_single){
                $message->to($data_single,"Asistente")
                ->subject("¡Bienvenido al Movimiento de Empresarios Creativos!","");
            });
        return view('Public.ViewEvent.Partials.ContentMail', $data);
   
    }
        
    public function sendContentToAll(Request $request)
    {
     
        $data = $request->json()->all();
        
        $Attendees = Attendee::where("event_id","5db215419567225895c8d296")->get();
        $attendees_size = $Attendees->count();
     
        for ($i=0;$i<$attendees_size;$i++){
           $tiempo = $data["time"];
           $limit =$data["limit"];
            $datos["email"] = $Attendees[$i]->email;
            $verification = $Attendees[$i]->email;
             if( $i > $limit && $i < $tiempo ){  
                echo "correo enviado # ".$i." a " .$verification ." rol = ".$Attendees[$i]->rol_assistant." id = ".$Attendees[$i]->identification."\n" ;
                
                if($Attendees[$i]->identification!=NULL ){
                
                    $datos["id"] = $Attendees[$i]->identification;
    
                }else{
                    $datos["id"] = "mec.2040";
                    $Attendees[$i]->identification = "mec.2040"; 
                    $Attendees[$i]->save();  
                }
    
                if($Attendees[$i]->rol_assistant==NULL){
                    $datos["etapa"] = "asistente";
                    
                }else{
                    $datos["etapa"] = $Attendees[$i]->rol_assistant;
                   
                }
                $data_single = $datos["email"];
                $etapa = $datos["etapa"];
                $email = $datos["email"];
                $id = $datos["id"];
                
                
                Mail::send("Public.ViewEvent.Partials.MecMail",$datos , function ($message) use ($datos,$data_single){
                    $message->to($data_single,"Asistente")
                    ->subject("¡No olvides inscribirte!","");
                });        
            }
        }
        return view('Public.ViewEvent.Partials.MecMail', $datos);
    }
    public function sendContentMec(Request $request)
    {
        
        $data = $request->json()->all();
        
        
        $data_single = $data["email"];
        
        Mail::send("Public.ViewEvent.Partials.ContentMailMec",$data , function ($message) use ($data,$data_single){
            $message->to($data_single,"Asistente")
            ->subject("¡Bienvenido al Movimiento de Empresarios Creativos!  ","");
        });
        
        return view('Public.ViewEvent.Partials.ContentMailMec', $data);
   
        
    
    }
    public function sendNotificationEmail(Request $request)
    {
        $data = $request->json()->all();
        $data_single = $data["email"];
        //subject, content, title,email       
                
            Mail::send("Public.ViewEvent.Partials.ContentNotification",$data , function ($message) use ($data,$data_single){
                $message->to($data_single,"Asistente")
                ->subject($data["subject"],"");
            });
        return view('Public.ViewEvent.Partials.ContentNotification', $data);
   
    }
    public function Attendee($id_user)
    {
        $eventUser = Attendee::find($id_user);
        $firestore = resolve('Morrislaptop\Firestore');

       
            $collection = $firestore->collection($eventUser->event_id.'-event_users');
            $user = $collection->document($eventUser->_id);
            $dataUser = json_decode($eventUser,true);
            $result = $user->snapShot();
            return $result;
    
        return  response('the proccess was incompleted :c');
    }
    public function sendPasswordRecovery(Request $request){
        


        $event_id = '5d6eb0cbd74d5c163179d0027';
        $eventUser = Attendee::find($event_id);
        $dataUser = json_decode($eventUser,true);

        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new \Kreait\Firebase\Factory)->withServiceAccount($serviceAccount)->create();

        $db = $firebase->getDatabase();
        $ref = $db->getReference('config');
        $snapShot = $ref->getSnapshot()->getValue();
        echo var_dump($snapShot);die;    
        $db->getReference('users/'.$eventUser->user->_id)->set($dataUser);
        
        return ($db->getReference('config/website/name')->set('New name'));       
        echo $collection;die;
    
    }
    public function sendPushNotification(Request $request)
    {
        $data = $request->json()->all();
        $to = $data["to"];
        $notification = $data['notification'];

        $apiKey = "AAAAXT-cAHM:APA91bGXwqFvaD_BnHeWrYwBW8M51YhqhvWpYtd1X_Knr8Q881KramBC4Swd0XA5zWac6_qbpwjWKWD_wWctbjrk1jexxTmFvySCqAucYMcws8RvuMQQ1XiWw72L0scG_Ge2aXyTpkFb";
        $fields = array( 'to' => $to, 'notification' => $notification );
        $headers = array('Authorization: key='.$apiKey, 'Content-Type: application/json');
        $url = 'https://fcm.googleapis.com/fcm/send';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result,true);
    }
}

?>