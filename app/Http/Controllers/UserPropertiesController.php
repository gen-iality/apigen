<?php

namespace App\Http\Controllers;

use App\Event;
use App\UserProperties;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class UserPropertiesController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new UserProperties();
    var_dump($a->getTable());
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
           Event::find($event_id)->user_properties()->get());
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
        $event = Event::find($event_id);
        $event->userProperties;
        $model = new UserProperties($data);
        $event->user_properties()->save($model);
        return $model; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProperties  $UserProperties
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id)
    {

        $UserProperties = Event::find($event_id)->user_properties()->find($id);
        
        $response = new JsonResource($UserProperties);
        //if ($UserProperties["event_id"] = $event_id) {
        return $response;

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserProperties  $UserProperties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        
        $data = $request->json()->all();
        
        $userProperty = Event::findOrFail($event_id)->user_properties()->find($id);
        if (!$userProperty){
            return abort(404);
        }
        $userProperty->fill($data);
        $userProperty->save();
        return new JsonResource($userProperty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {   
        $event = Event::findOrFail($event_id);
       
        $userProperty = $event->user_properties()->find($id);
        if (!$userProperty){
            return abort(404);
        }
        return (string) $userProperty->delete();
    }
}
