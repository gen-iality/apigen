<?php

namespace App\Http\Controllers;

use App\Event;
use App\Activities;
use App\Attendee;
use Mail;
use Auth;
use App\ActivityAssistants;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Validator;
use App\State;
use App\Account;
use Illuminate\Http\Response;
use App\evaLib\Services\FilterQuery;
use App\Http\Requests\EventUserRequest;
use App\Http\Resources\EventUserResource;
use App\evaLib\Services\UserEventService;

/**
 * @resource Event
 *
 *
 */
class ActivityAssistantsController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Inscription  $Inscription
     * @return \Illuminate\Http\Response
     */
    public function fillassitantsbug($id)
    {
       // $ActivityAssistants = ActivityAssistants::all();
       //Esta activityassistant se perdio 5dbc99bad74d5c5822693842
       $ActivityAssistant = ActivityAssistants::find($id);
       if ($ActivityAssistant)
       $ActivityAssistant->save();

        var_dump($ActivityAssistants->user_ids);
        $response = new JsonResource($ActivityAssistants);
        var_dump($response);
        die;

    }    
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
        $getsize = ActivityAssistants::find($model[0]["_id"])->user_ids;
        $activities = Activities::find($activity_id)->capacity; 
        $size = $getsize;
        
        if(sizeof($size) < $activities){
            
        
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
                $dataRecolected = $activity->makeHidden(["access_restriction_types_available","access_restriction_type","access_restriction_rol_ids","access_restriction_roles","user_ids","space_id","remaining_capacity","capacity","activity_categories_ids","activity_categories_ids","activity_categories_ids","host_ids","users",]);
                $dataRecolected = json_decode(json_encode($dataRecolected),TRUE);
                $user_id = ($data["user_id"]);
                $save = Attendee::find($user_id);
                if (!is_null($save)){
                    //$save->destroy("activities");
                    $save->push("activities",$dataRecolected);
                }
            }
        }
            return $model;
        
    }
    return "Cupo lleno";
    }
    
    public function deleteAssistant(Request $request, $event_id)
    {
        $data = $request->json()->all();
        //$activitysize = $data["acitivity_id"];

        $activityname = Activities::find($data["activity_id"])->name;
        $data["name"] = $activityname;

        $useremail = $data["user_email"];

        $activityname = str_replace(" ", "%20", $activityname);
        $data["url"] = "https://docs.google.com/forms/d/e/1FAIpQLSeKIA54wmkCOL38EZ8rUpEJWN86xqqQuHDDsYfW1_WoHwWtLg/viewform?usp=pp_url&entry.230442346=".$activityname;
        echo $data["url"];
        $data["activity_name"] = $activityname;
        Mail::send("Public.ViewEvent.Partials.SuggestedSchedule",$data , function ($message) use ($useremail,$activityname){    
            $message->to($useremail,"Asistente")
            ->subject("Encuesta de satisfacción MEC 2019","");
        });
        
        
        
        
        
        
        
       // 
       /* 
        //$users = Attendee::find();
        $data = $request->json()->all();
        
        $models = ActivityAssistants::find("5dc60295d74d5c74ff2d4af2")->user_ids;
        $modelreplace = ActivityAssistants::find("5dc60295d74d5c74ff2d4af2");
        $activitysize = Activities::find($modelreplace->activity_id)->capacity;
        
        $arrayusers = $models;
        $x = 0;
        $activitysize = $activitysize-1 ;
        foreach($arrayusers as $arrayuser){
                    
                    $useremail = Attendee::find($arrayuser)->email;
                    $firebase = $this->auth->getUserByEmail($useremail);
                    echo $firebase;
                    
                    echo "correo enviado".$useremail.$x;
                    $data["activity_name"] = Activities::find($modelreplace->activity_id)->name;
                    $firebase = ($useremail);
                    
                    /* Mail::send("Public.ViewEvent.Partials.SuggestedSchedule",$data , function ($message) use ($useremail){
                        $message->to($useremail,"Asistente")
                        ->subject("Aforo completado, te invitamos a estas actividades","");
                    }); */

                    //unset($arrayusers[$x]);
            //$x++;
        

        /*
        $modelreplace->user_ids = $arrayusers;
        $modelreplace->push();

        $actualUsers = $modelreplace["user_ids"]; //extrae los usuarios
        $actualUsers = sizeof($actualUsers); //mide el array de usuarios 
        $totalCapacity = Activities::find($modelreplace->activity_id)->capacity; // capacidad actual de la actividad 
        $remaining = $totalCapacity - $actualUsers;  //calculos                
        $remainingCapacity = Activities::find($modelreplace->activity_id); 
        $remainingCapacity->remaining_capacity = $remaining;
        $remainingCapacity->save(); //guarda el resultado   
        */
        /* LO INICIAL NO ELIMINAR PERO USAR 
        $data = $request->json()->all();
        $activity_id =$data["activity_id"];
        $user = $data["user_id"];
        $model = ActivityAssistants::where("activity_id",$activity_id)->get();
        $modelreplace = ActivityAssistants::find($model[0]["_id"]);
        $model = ActivityAssistants::find($model[0]["_id"])->user_ids;
       
        $arrayUsers = $model;
        //mapea el array para detectar el usuario que se le parezca
        foreach($arrayUsers as $arrayUser){
            if($arrayUser == $user){
                unset($arrayUsers[$x]);
            }
            $x++;
        }
        $modelreplace->user_ids = $arrayUsers;
        $modelreplace->push();*/
         /*
            * calcular cupos restantes
            */
         /*
            $actualUsers = $modelreplace["user_ids"]; //extrae los usuarios
            $actualUsers = sizeof($actualUsers); //mide el array de usuarios 
            $totalCapacity = Activities::find($activity_id)->capacity; // capacidad actual de la actividad 
            $remaining = $totalCapacity - $actualUsers;  //calculos                
            $remainingCapacity = Activities::find($activity_id); 
            $remainingCapacity->remaining_capacity = $remaining;
            $remainingCapacity->save(); //guarda el resultado   

        return $modelreplace;*/
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
