<?php

namespace App\Http\Controllers;

use App\Event;
use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        $data = $request->json()->all();
        if(!empty($data["father_id"])){
            return JsonResource::collection(
                Documents::where("event_id", $event_id)->where("father_id", $data["father_id"])->paginate(config('app.page_size'))
            );
        }
        return JsonResource::collection(
            Documents::where("event_id", $event_id)->where("state", "father")->paginate(config('app.page_size'))
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
        if(!empty($data["father_id"])){
            $data = $request->json()->all();
            $data["event_id"] = $event_id;
            $data["state"] = "child";     
            $result = new Documents($data);
                $result->save();
                return $result;
            }

            $data["event_id"] = $event_id;     
            $data["state"] = "father"; 
            $result = new Documents($data);
                $result->save();
                return $result;
    }


    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $push = Documents::findOrFail($id);
        //if($Space["event_id"]= $event_id){
        $push->fill($data);
        $push->save();
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Documents  $Documents
     * @return \Illuminate\Http\Response
     */

     
    public function show($event_id,$id)
    {
        $documents = Documents::findOrFail($id);
        $response = new JsonResource($documents);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {
        $documents = Documents::findOrFail($id);
        return (string) $documents->delete();
    }
}
