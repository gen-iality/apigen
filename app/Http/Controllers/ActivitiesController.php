<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Category;
use App\Event;
use App\RoleAttendee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
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
            Activities::where("event_id", $event_id)->paginate(config('app.page_size'))
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $data["event_id"] = $event_id;
        
        $activity = new Activities($data);     
        $activity->save();       

        if(isset($data["activity_categories_ids"])){
            $activity_categories_ids = $data["activity_categories_ids"];
            $activity->activity_categories()->attach($activity_categories_ids);
        }
        if(isset($data["host_ids"])){
            $host_ids = $data["host_ids"];
            $activity->hosts()->attach($host_ids);
        }
        if(isset($data["type_id"])){
            $type_id = isset($data["type_id"]);
            $activity->type()->push($type_id); 
        }
        if(isset($data["space_id"])){
            $space_id = $data["space_id"];
            $activity->space()->push($space_id);            
        }
        if(isset($data["access_restriction_rol_ids"])){
            $ids = $data["access_restriction_rol_ids"];
            $activity->access_restriction_roles()->attach($ids);        
        }
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
        if(isset($data["activity_categories_ids"])){
            $activity_categories_ids = $data["activity_categories_ids"];
            $Activities->activity_categories()->detach();
            $Activities->activity_categories()->attach($activity_categories_ids);
        }
        if(isset($data["host_ids"])){
            $host_ids = $data["host_ids"];
            $Activities->hosts()->detach();
            $Activities->hosts()->attach($host_ids);
        }
        if(isset($data["type_id"])){
            $type_id = isset($data["type_id"]);
            $Activities->type()->pull($data["type_id"]);
            $Activities->type()->push($type_id); 
        }        
        if(isset($data["space_id"])){
            $space_id = $data["space_id"];
            $Activities->space()->pull($data["space_id"]);
            $Activities->space()->push($space_id);            
        }
        if(isset($data["access_restriction_rol_ids"])){
            $ids = $data["access_restriction_rol_ids"];
            $Activities->access_restriction_roles()->detach();
            $Activities->access_restriction_roles()->attach($ids);        
         
        }
        $activity = Activities::find($Activities->id);
        return $activity;
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
