<?php

namespace App\Http\Controllers;

use App\Event;
use App\CategoryActivities;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class CategoryActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
            CategoryActivities::paginate(config('app.page_size'))
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
        //$data["event_id"] = $event_id;
        $result = new CategoryActivities($data);
        $result->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryActivities  $CategoryActivities
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id )
    {
        $CategoryActivities = CategoryActivities::findOrFail($id);
        $response = new JsonResource($CategoryActivities);
        return $response;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryActivities  $CategoryActivities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $CategoryActivities = CategoryActivities::findOrFail($id);
        $CategoryActivities->fill($data);
        $CategoryActivities->save();
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
        $CategoryActivities = CategoryActivities::findOrFail($id);
        return (string) $CategoryActivities->delete();
    }
}