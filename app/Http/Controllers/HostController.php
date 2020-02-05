<?php

namespace App\Http\Controllers;

use App\Event;
use App\Host;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resource Event
 *
 *
 */
class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        $data = $request->json()->all();
        //esta condicion expresa si existe la variable 'locale' en una peticion por json o por url, y valida que valor existe en estas varibles
        $res = (!empty($data['locale']) && $data['locale'] == "en" || !empty($request->input('locale')) && $request->input('locale') == "en") ? "en" : "es";

        if($res=="en"){
            return JsonResource::collection(
                Host::where("event_id", $event_id)->where('locale', "en")->paginate(config('app.page_size')));
        }else{
            return JsonResource::collection(
                Host::where("event_id", $event_id)->where('locale', '!=', "en")->paginate(config('app.page_size')));
        }
    
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
        $result = new Host($data);
        $result->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Host  $Host
     * @return \Illuminate\Http\Response
     */
    public function show($event_id,$id )
    {
        $Host = Host::findOrFail($id);
        $response = new JsonResource($Host);
        return $response;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Host  $Host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $Host = Host::findOrFail($id);
        $Host->fill($data);
        $Host->save();
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
        $Host = Host::findOrFail($id);
        return (string) $Host->delete();
    }
}
