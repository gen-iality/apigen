<?php

namespace App\Http\Controllers;

use App\Mailing;
use Mail;
use App\Event;
use App\Attendee;
use App\Mail\reminder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 */
class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
            Mailing::where("event_id", $event_id)->paginate(config('app.page_size'))
        );
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $data["event_id"] = $event_id;
        $mails = $data["mails"];
        $result = new Mailing($data);
        $title = $data["title"];
        $desc = $data["desc"];
        $subject = $data["subject"];
        $result->save();
        $email = Attendee::where("event_id",$event_id)->where("email",$mails)->get();
        $list = json_decode(json_encode($email),true); 
        foreach ($list as $value) {
            Mail::to($value["email"])->send(
            new reminder($value,$title,$desc,$subject)
        );
            return $result;
        }
    }

    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $mail = Mailing::findOrFail($id);
        //if($Space["event_id"]= $event_id){
        $mail->fill($data);
        $mail->save();
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $Mail
     * @return \Illuminate\Http\Response
     */

     
    public function show($event_id,$id)
    {
        $Mail = Mailing::findOrFail($id);
        $response = new JsonResource($Mail);
        //if ($Mail["event_id"] = $event_id) {
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {
        $Mail = Mailing::findOrFail($id);
        return (string) $Mail->delete();
    }
}
