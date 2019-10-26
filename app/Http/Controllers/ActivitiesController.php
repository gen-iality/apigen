<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Category;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
            Activities::paginate(config('app.page_size'))
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
        $category_ids = $data["category_ids"];
        $host_ids = $data["hosts_id"];
        $space_id = $data["space_id"];  
        $type_id = $data["type_id"];
        
        $activity = new Activities($data);      
        $activity->save();       
        $activity->categories()->attach($category_ids);
        $activity->hosts()->attach($host_ids);
                
        //Cargamos de nuevo para traer la info de las categorias
        $activity = Activities::find($activity->id);        
        return $activity;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activities  $Activities
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        $Activities = Activities::findOrFail($id);
        //$categories = $Activities->category()->get();
        //return $categories;
        $array = $Activities = Activities::findOrFail($id);
                                                                                        
        //Cargamos de nuevo para traer la info de las categorias
        return $Activities;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activities  $Activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $Activities = Activities::findOrFail($id);
        $Activities->fill($data);
        $Activities->save();
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
        $Activities = Activities::findOrFail($id);
        return (string) $Activities->delete();
    }
}
