<?php

namespace App\Http\Controllers;

use App\Event;
use App\PushNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class PushNotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
            PushNotification::where("event_id", $event_id)->paginate(config('app.page_size'))
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
        $saveData = new PushNotification($data);
        
        $saveData->save();
   
        $eventId = $data["event_id"];
        $title = $data["title"];
        $body = $data["body"];
//        $route = $data["route"];
        $fields = array('event_id' => $eventId, 'petitionId' => $saveData->_id ,'title' => $title, 'body' => $body, 'route' => $route);
        $headers = array('Content-Type: application/json');
        $url = config('app.pushdirection')."/pushNotification";
        echo "send to". config('app.pushdirection')."/pushNotification"; 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
        $result = curl_exec($ch);
        curl_close($ch);
        return "enviado".json_decode($result,true);
    }


    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $push = PushNotification::findOrFail($id);
        //if($Space["event_id"]= $event_id){
        $push->fill($data);
        $push->save();
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\PushNotification  $PushNotification
     * @return \Illuminate\Http\Response
     */

     
    public function show($event_id,$id)
    {
        $pushnotification = PushNotification::findOrFail($id);
        $response = new JsonResource($pushnotification);
        //if ($PushNotification["event_id"] = $event_id) {
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
        $pushnotification = PushNotification::findOrFail($id);
        return (string) $pushnotification->delete();
    }
}
