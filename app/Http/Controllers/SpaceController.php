<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Space;
/**
 * @resource Event
 *
 *
 */
class SpaceController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new Space();
    var_dump($a->getTable());
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Space::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $result = new Space($data);
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
     * @param  \App\Space  $Space
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $Space = Space::findOrFail($id);
        $response = new JsonResource($Space);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Space  $Space
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $Space = Space::find($id);
        $Space->fill($data);
        $Space->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,string $id)
    {  
        $Space = Space::findOrFail($id); 
        return (string)$Space->delete();
            
    }


    public function indexByEvent(Request $request, String $event_id)
    {
        $query = Space::where("event_id", $event_id);
        $results = $query->get();
        return JsonResource::collection($results);
    }
}