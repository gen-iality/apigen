<?php

namespace App\Http\Controllers;

use App\Event;
use App\Activities;
use App\Attendee;
use App\ActivityAssistants;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class ActivityAssistantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
            ActivityAssistants::where("event_id", $event_id)->paginate(config('app.page_size'))
        );
    }

    /**<
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function activitieAssistant(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $activity_id =$data["activity_id"];
        $data["event_id"] = $event_id;
        $result = new ActivityAssistants($data);
        $model = ActivityAssistants::where("activity_id",$activity_id)->get();
        $arr = json_decode(json_encode($model), TRUE);
        if(empty($arr)){
            $result->push("user_ids",$data["user_id"]);
            $result->save();
            return $result;
        }else{
            $model = ActivityAssistants::where("activity_id",$activity_id)->get();
            $model = ActivityAssistants::find($model[0]["_id"]);
            $model->push("user_ids",$data["user_id"]);
            /*
            * calcular cupos restantes
            */
            $actualUsers = $model["user_ids"]; //extrae los usuarios
            $actualUsers = sizeof($actualUsers); //mide el array de usuarios 
            $totalCapacity = Activities::find($activity_id)->capacity; // capacidad actual de la actividad 
            $remaining = $totalCapacity - $actualUsers;  //calculos
            $remainingCapacity = Activities::find($activity_id); 
            $remainingCapacity->remaining_capacity = $remaining;
            $remainingCapacity->save(); //guarda el resultado            

            $activity = Activities::find($activity_id);    
            if(!is_null($activity)){
                $dataRecolected = $activity->makeHidden(["user_ids","space_id","remaining_capacity","capacity","activity_categories_ids","activity_categories_ids","activity_categories_ids","host_ids","quantity","image","activity_categories","space","users","hosts","type"]);
                $dataRecolected = json_decode(json_encode($dataRecolected),TRUE);
                $user_id = ($data["user_id"]);
                $save = Attendee::find($user_id);
                if (!is_null($save)){
                    //$save->destroy("activities");
                    $save->push("activity_id",$dataRecolected);
                }
            }
            return $model;
        }
    }
    
    public function deleteAssistant(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $activity_id =$data["activity_id"];
        $user = $data["user_id"];
        $model = ActivityAssistants::where("activity_id",$activity_id)->get();
        $modelreplace = ActivityAssistants::find($model[0]["_id"]);
        $model = ActivityAssistants::find($model[0]["_id"])->user_ids;
        $x = 0;
        $arrayUsers = $model;
        //mapea el array para detectar el usuario que se le parezca
        foreach($arrayUsers as $arrayUser){
            if($arrayUser == $user){
                unset($arrayUsers[$x]);
            }
            $x++;
        }
        $modelreplace->user_ids = $arrayUsers;
        $modelreplace->push();
         /*
            * calcular cupos restantes
            */
         
            $actualUsers = $modelreplace["user_ids"]; //extrae los usuarios
            $actualUsers = sizeof($actualUsers); //mide el array de usuarios 
            $totalCapacity = Activities::find($activity_id)->capacity; // capacidad actual de la actividad 
            $remaining = $totalCapacity - $actualUsers;  //calculos                
            $remainingCapacity = Activities::find($activity_id); 
            $remainingCapacity->remaining_capacity = $remaining;
            $remainingCapacity->save(); //guarda el resultado   

        return $modelreplace;
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inscription  $Inscription
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id)
    {
        $ActivityAssistants = ActivityAssistants::findOrFail($id);
        $response = new JsonResource($ActivityAssistants);
        //if ($Inscription["event_id"] = $event_id) {
        return $response;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inscription  $Inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $ActivityAssistants = ActivityAssistants::findOrFail($id);
        //if($Inscription["event_id"]= $event_id){
        $ActivityAssistants->fill($data);
        $ActivityAssistants->save();
        return $data;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {
        $ActivityAssistants = ActivityAssistants::findOrFail($id);
        return (string) $ActivityAssistants->delete();
    }
}
