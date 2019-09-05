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
    public function index(Request $request)
    {

        return JsonResource::collection(
            RoleAttendee::paginate(config('app.page_size'))
        );

        //$events = Event::where('visibility', $request->input('name'))->get();
    }


    public function indexByEvent(Request $request, String $event_id)
    {
        $results = RoleAttendee::where("event_id", $event_id)->get();


        return JsonResource::collection($results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   /**
     * Store a newly created resource in storage.
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
    public function delete($id)
    {
        $res = $id->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
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
    public function show(String $id)
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
    public function update(Request $request, string $id)
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
    public function destroy(Request $request,string $id)
    {  
        $model = Role::find($id); 
        $res = $model->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }
}