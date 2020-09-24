<?php

namespace App\Http\Controllers;

use App\RoleAttendee;
use App\Event;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Storage;

/**
 * @resource Event
 *
 *
 */
class RoleAttendeeController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new RoleAttendeeAttendee();
    var_dump($a->getTable());
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,String $event_id)
    {

        $results = RoleAttendee::where("event_id", $event_id)->get();


        return JsonResource::collection($results);

        //$events = Event::where('visibility', $request->input('name'))->get();
    }


    public function indexByEvent(Request $request, String $event_id)
    {
        $results = RoleAttendee::where("event_id", $event_id)->get();


        return JsonResource::collection($results);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, String $event_id)
    {
        $data = $request->json()->all();
        $result = new RoleAttendee($data);
        $result->save();
        return $result;   
    }
    


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\RoleAttendee  $RoleAttendee
     * @return \Illuminate\Http\Response
     */
    public function show(String $event_id, String $id)
    {
        $RoleAttendee = RoleAttendee::find($id);
        $response = new JsonResource($RoleAttendee);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $RoleAttendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $event_id, String $id)
    {
        $data = $request->json()->all();
        $RoleAttendee = RoleAttendee::find($id);
        $RoleAttendee->fill($data);
        $RoleAttendee->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,String $event_id, String $id)
    {  
        $RoleAttendee = RoleAttendee::findOrFail($id);
        return (string)$RoleAttendee->delete();
    }
}