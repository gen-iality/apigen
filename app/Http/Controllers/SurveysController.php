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

        $activity = Activities::find($data["activity_id"]);
        $activities_array = $activity->survey_ids;
        array_push($activities_array,$data["activity_id"]);
        $new_activities["survey_ids"] = $activities_array;
        $activity->fill($new_activities);
        $activity->save();
        
        $result->activities($data["activity_id"]);
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
        $survey->fill($data);
        $survey->save();
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
        $survey = Survey::findOrFail($id);
        return (string) $survey->delete();
    }
}