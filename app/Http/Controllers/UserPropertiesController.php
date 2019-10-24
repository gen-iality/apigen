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
            UserProperties::where("event_id", $event_id)->paginate(config('app.page_size'))
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
        $result = new UserProperties($data);
        $result->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserProperties  $UserProperties
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id)
    {
        $UserProperties = UserProperties::findOrFail($id);
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
        $UserProperties = UserProperties::findOrFail($id);
        //if($UserProperties["event_id"]= $event_id){
        $UserProperties->fill($data);
        $UserProperties->save();
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
        $UserProperties = UserProperties::findOrFail($id);
        return (string) $UserProperties->delete();
    }
}
