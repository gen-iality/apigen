<?php

namespace App\Http\Controllers;

use App\Event;
use App\Attendee;
use App\Mail;
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
            Mail::where("event_id", $event_id)->paginate(config('app.page_size'))
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
        $result = new Mail($data);
        $user_id = [];
        
        $result->save();
            $email = Attendee::where("event_id",$event_id)->where("email",$mails)->get();
            $list = json_decode(json_encode($email),true); 
            foreach ($list as $value) {
                array_push($user_id,$value["_id"]);
                Mail::to($value["email"])->send(
                new RSVP($value)
                );
                return $value;
            }
        
        Mail::to($email)->send(
            new RSVP($result->data)
        );
        return $result;
    }
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $mail = Mail::findOrFail($id);
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
        $Mail = Mail::findOrFail($id);
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
        $Mail = Mail::findOrFail($id);
        return (string) $Mail->delete();
    }
}
