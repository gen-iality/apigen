<?php

namespace App\Http\Controllers;

use App\Event;
use App\Survey;
use App\Activities;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class surveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {   
        if($request->input("indexby") && $request->input("value")){
            $index = $request->input("indexby");
            $value = $request->input("value");
            return JsonResource::collection(
                Survey::where("event_id", $event_id)->where($index,$value)->paginate(config('app.page_size'))
            );
        }

        return JsonResource::collection(
            Survey::where("event_id", $event_id)->paginate(config('app.page_size'))
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
        $result = new Survey($data);
        if(!empty($data["activity_id"]) ){
            $activity = Activities::find($data["activity_id"]);
            if(empty($activity->survey_ids)){
                $activities_array = [];
            }else{
                $activities_array = $activity->survey_ids;
            }   
            array_push($activities_array,$data["activity_id"]);
            $new_activities["survey_ids"] = $activities_array;
            $activity->fill($new_activities);
            $activity->save();

            $result->activities($data["activity_id"]);
            
        }
        $result->save();
        return $result; 
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id)
    {
        $survey = Survey::findOrFail($id);
        $response = new JsonResource($survey);
        //if ($survey["event_id"] = $event_id) {
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $survey = Survey::findOrFail($id);
        //if($survey["event_id"]= $event_id){
        if($request->input("newquestion")){
            if(is_null($survey->questions)){
                $questions["questions"][0] = $data;
            }else{
                $questions["questions"] = $survey->questions;                
                array_push($questions["questions"],$data);
            }
        $survey->fill($questions);
        $survey->save();
        return $data;
        }
    
            
        //if(!empty($question)){
        //    $survey->questions = [];
        //}
        $survey->fill($data);
        $survey->save();
        return $data;
    }

    public function updatequestions(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $survey = Survey::findOrFail($id);
        if($request->input("questionNo") && is_integer($int = (int)$request->input("questionNo"))){

                //aqui se guarda la peticion
                $questions["questions"][$request->input("questionNo")] = $data;// = $survey->questions[$request->input("questionNo")];                
                //aqui se guardan los valores existentes de las preguntas de la bdd
                $final_merge["questions"] = $survey->questions;
                //aqui se combinan los valores de la pregunta a editar de la peticion y la base de datos
                $new_questions = array_merge($survey->questions[$request->input("questionNo")],$questions["questions"][$request->input("questionNo")]);
                //aqui la pregunta se actualiza 
                $final_merge["questions"][$request->input("questionNo")] = $new_questions;
                $survey->fill($final_merge);
                $survey->save();
                return $data;
            }
    return "no question id sent or invalid format";
    }
    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $survey = Survey::findOrFail($id);
        if(!is_null($request->input("delete"))){
            $questionnumber = $request->input("delete");
            if(is_null($survey->questions)){
                return "todavia no se han creado preguntas.";
            }else{
                $questions["questions"] = $survey->questions;                
                unset($questions["questions"][$questionnumber]);
                $questions["questions"] = array_values($questions["questions"]);
            }
        $survey->fill($questions);
        $survey->save();
        return "pregunta eliminada";
        }
        return (string) $survey->delete();
    }

}