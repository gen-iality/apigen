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
     * _index_: Listado de los roles de los asistentes.
     * 
     * @urlParam event_id required
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
     * _indexByEvent_: Buscar roles por evento.
     * 
     * @urlParam event_id required
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
     * _store_:Crear un nuevo rol de asistente para un evento.
     * 
     * @bodyParam name string required nombre del rol 
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
     * _show_: Ver información de un rol de asistente específico.
     *
     * @urlParam id required id de RoleAttendee
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
     * _update_: Actualizar un rol del evento
     *
     * @urlParam id required id de RoleAttendee
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $RoleAttendee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        $data = $request->json()->all();
        $RoleAttendee = RoleAttendee::find($id);
        $RoleAttendee->fill($data);
        $RoleAttendee->save();
        return $data;
    }

    /**
     * 
     * _destroy_: Eliminar un rol específico de asistente.
     * 
     * @urlParam id required id de RoleAttendee
     * 
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, String $id)
    {  
        $RoleAttendee = RoleAttendee::findOrFail($id);
        return (string)$RoleAttendee->delete();
    }
}