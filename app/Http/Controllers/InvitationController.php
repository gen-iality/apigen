<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\Event;
use App\Models\Attendee;
use Illuminate\Http\Request;
use App\Mail\friendRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Mail;
use GuzzleHttp\Client;
use App\Mailing;
use PDF;
use Storage;

/**
 * @resource Event
 *
 *
 */
class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$event_id)
    {
        return JsonResource::collection(
            Invitation::where("event_id",$event_id)->paginate(config('app.page_size'))
        );
    }

    public function invitationsSent(Request $request,$event_id,$user_id)
    {
        return JsonResource::collection(
            Invitation::where("id_user_requested",$user_id)->where("event_id",$event_id)->paginate(config('app.page_size'))
        );
    }

    public function invitationsReceived(Request $request,$event_id,$user_id)
    {
        return JsonResource::collection(
            Invitation::where("id_user_requesting",$user_id)->where("event_id",$event_id)->paginate(config('app.page_size'))
        );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$event_id)
    {

        // end point para enviar solicitud con redireccion a evius
        $data = $request->json()->all();   
        $result = new Invitation($data);
	    $result->save();
        echo self::buildMessage($data,$event_id);   
        return "Invitation send";
    }

    public function sendPushNotification($push_notification){
        $url = config('app.api_evius')."/events/".$push_notification["event_id"]."/sendpush";
        echo var_dump($push_notification);
        $fields = array('event_id' => $push_notification["event_id"], 'title' => "Nueva solicitud",'img' => true, 'body' => $push_notification["body"] , 'User_ids' => [$push_notification["User_ids"]] );
        
        $headers = array('Content-Type: application/json');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
        $result = curl_exec($ch);
        curl_close($ch);        
        return $result;
    } 

    public function acceptOrDeclineFriendRequest(Request $request,String $event_id,String $id){
        $data = $request->json()->all();
        $Invitation = Invitation::find($id);
        
        $resp["response"] = $data["response"];
        $Invitation->fill($resp);
        $Invitation->save();
        $resp["id_user_requested"] = $Invitation->id_user_requested;
        $resp["id_user_requesting"] = $Invitation->id_user_requesting;
        return self::buildMessage($resp,$event_id);
    }

    public function buildMessage($data,String $event_id){

        $event = Event::find($event_id);
        $receiver = Attendee::find($data["id_user_requesting"]);
        $sender = Attendee::find($data["id_user_requested"]);
        $client = new Client();     
        
        $mail["mails"] = [$receiver->email];
        $mail["subject"] = "solicitud de amistad";
        $mail["title"] = $sender->properties["displayName"] . " Te ha enviado una solicitud de amistad";
        $mail["desc"] = "Hola ".$receiver->properties["displayName"].", quiero contactarte por medio del evento ".$event->name;
        $mail["sender"] = $event->name;
        $mail["event_id"] = $event_id;

        if(!empty($data["response"])){
            $mail["mails"] = [$sender->email];
            $mail["title"] = $data["response"] == "acepted " ? $receiver->properties["displayName"] . " ha aceptado tu solicitud" : $receiver->properties["displayName"] . " Ha declinado tu solicitud de amistad" ;    
            $mail["subject"] = "Respuesta a solicitud de amistad";
            $mail["desc"] = $data["response"] == "acepted" ? $receiver->properties["displayName"]." ha aceptado tu solicitud de amistad para el evento ".$event->name : "Lo sentimos ".$receiver->properties["displayName"]." ha declinado tu solicitud de amistad para el evento ".$event->name;
        }

        //echo self::sendPushNotification($push_notification);
        echo self::sendEmail($mail,$event_id);
        return "Invitation send";
    }   

    public function sendEmail($mail,$event_id){
        
        $mail["event_id"] = $event_id;
        $mail["type"] = "friend request sent" ;
        $result = new Mailing($mail);
        $title = $mail["title"];    
        $desc = $mail["desc"];
        $img = "no img for now";
        $sender = $mail["sender"];
        $subject = $mail["subject"];
        $result->save();
        $email = Attendee::where("event_id",$event_id)->where("email",$mail["mails"])->get();
        $list = json_decode(json_encode($email),true);
        
        foreach ($mail["mails"] as $key => $value) {    
            Mail::to($value)->send(
                new friendRequest($event_id,$title,$desc,$subject,$img,$sender)
            );
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $Invitation
     * @return \Illuminate\Http\Response
     */
    public function show(string $event_id, string $id)
    {
        // esto muestra la informacion filtrada por event user

        $Invitation = Invitation::findOrFail($id);
        $response = new JsonResource($Invitation);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $Invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $event_id, string $id)
    {
        $data = $request->json()->all();
        $Invitation = Invitation::findOrFail($id);
        $Invitation->fill($data);
        $Invitation->save();
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
        $Invitation = Invitation::findOrFail($id);
        return (string) $Invitation->delete();

    }

    public function SendInvitation(Request $request)
    {
        echo "hi"; die;
   //     $data = $request->json()->all();
   //     if ($request->get('send') == '1') {
   //         $pdf = PDF::loadview('Public.ViewEvent.Partials.Invitation', $data);
   //         $pdf->setPaper( 'letter',  'landscape' );
   //         return $pdf->download('content.pdf');
   //         return view('Public.ViewEvent.Partials.ContentMail', $data);
   //         $data_single = "tfrdrummer@gmail.com";
   //         Mail::send("Public.ViewEvent.Partials.ContentMail",$data , function ($message) use ($data,$pdf,$data_single){
   //             $message->to($data_single,"Evento PMI")
   //             ->subject("HI¡","ni idea");
   //         });
//
   //     }
   //     return view('Public.ViewEvent.Partials.Invitation', $data);
    
    }

}
