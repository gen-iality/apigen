<?php

namespace App\Http\Controllers;

use App\RoleAttendee;
use App\Event;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Storage;

/**
 * @group RoleAttendee
 */
class RoleAttendeeController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new RoleAttendeeAttendee();
    var_dump($a->getTable());
     */

    /**
     * _index_: list of the roles of the attendees of an event
     * 
     * @urlParam event_id required event id Example: 5ea23acbd74d5c4b360ddde2
     *
     * @return \Illuminate\Http\Response
    */
    public function index(String $event_id)
    {

        $results = RoleAttendee::where("event_id", $event_id)->get();


        return JsonResource::collection($results);

        //$events = Event::where('visibility', $request->input('name'))->get();
    }

    /**
     * _indexByEvent_: search roles by event
     * 
     * @urlParam event_id required Example: 5fa423eee086ea2d1163343e
     * 
     * @param String $event_id
     * @return void
     */
    public function indexByEvent(String $event_id)
    {
        $results = RoleAttendee::where("event_id", $event_id)->get();


        return JsonResource::collection($results);
    }

    /**
     * _store_:create a new assistant role for an event
     * 
     * @urlParam event_id required Example: 5fa423eee086ea2d1163343e
     * 
     * @bodyParam name string required rol name Example: Profesor
     * @bodyParam event_id string required event id  Example: 5fa423eee086ea2d1163343e     
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $result = new RoleAttendee($data);
        $result->save();
        return $result;   
    }    

    /**
     * _show_: view information for a specific assistant role
     *
     * @urlParam event_id required Example: 5ea23acbd74d5c4b360ddde2
     * @urlParam rolesattendee required RoleAttendee id Example: 5faefba6b68d6316213f7cc2
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
     * _update_: update role event
     *
     * @urlParam id required id de RoleAttendee Example: 5faefba6b68d6316213f7cc2
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $RoleAttendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, String $id)
    {
        $data = $request->json()->all();
        $RoleAttendee = RoleAttendee::find($id);
        $RoleAttendee->fill($data);
        $RoleAttendee->save();
        return $data;
    }

    /**
     * 
     * _destroy_: delete rol.
     * 
     * @urlParam id required id de RoleAttendee
     * 
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, String $id)
    {  
        $RoleAttendee = RoleAttendee::findOrFail($id);
        return (string)$RoleAttendee->delete();
    }
}