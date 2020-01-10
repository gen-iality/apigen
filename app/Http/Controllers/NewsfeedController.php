<?php

namespace App\Http\Controllers;

use App\Event;
use App\Newsfeed;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class NewsfeedController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        return JsonResource::collection(
            Newsfeed::where("event_id", $event_id)->paginate(config('app.page_size'))
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
        $result = new Newsfeed($data);
        $result->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsfeed  $Newsfeed
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id)
    {
        $Newsfeed = Newsfeed::findOrFail($id);
        $response = new JsonResource($Newsfeed);
        //if ($Newsfeed["event_id"] = $event_id) {
        return $response;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsfeed  $Newsfeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $newsfeed = Newsfeed::findOrFail($id);
        //if($Newsfeed["event_id"]= $event_id){
        $newsfeed->fill($data);
        $newsfeed->save();
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
        $Newsfeed = Newsfeed::findOrFail($id);
        return (string) $Newsfeed->delete();
    }
}
