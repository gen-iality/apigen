<?php

namespace App\Http\Controllers;

use App\Event;
use App\Host;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @group Host(Speakers)
 * 
 * The host or conferences are in charge of carrying out the activities
 */
class HostController extends Controller
{
    /**
     * _index_: list all host
     * 
     * @urlParam event_id required
     * 
     * @response{
     *     "created_at": "2020-11-05 20:23:33",
     *     "description": "<p>Es todo un profesional</p>",
     *     "description_activity": "true",
     *     "event_id": "5fa423eee086ea2d1163343e",
     *     "image": null,
     *     "name": "Primer conferencista",
     *     "order": 1,
     *     "profession": "Ingeniero",
     *     "updated_at": "2020-11-05 20:23:33",
     *     "_id": "5fa45f453766a90b471a0f22"
     * }
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        $data = $request->json()->all();
        //esta condicion expresa si existe la variable 'locale' en una peticion por json o por url, y valida que valor existe en estas varibles
        $res = (!empty($data['locale']) && $data['locale'] == "en" || !empty($request->input('locale')) && $request->input('locale') == "en") ? "en" : "es";

        if ($res == "en") {
            return JsonResource::collection(
                Host::where("event_id", $event_id)
                    ->where('locale', "en")
                    ->orderBy('order', 'asc')
                    ->paginate(config('app.page_size')));
        } else {
            return JsonResource::collection(
                Host::where("event_id", $event_id)
                    ->where('locale', '!=', "en")
                    ->orderBy('order', 'asc')
                    ->paginate(config('app.page_size')));
        }

    }

    /**
     * _store_: create new host
     *
     * @urlParam event_id required
     * 
     * @bodyParam description string Example: <p>Es todo un profesional</p>
     * @bodyParam description_activity string Example: true
     * @bodyParam image string
     * @bodyParam name string Example: Primer conferencista
     * @bodyParam order number Example: 1
     * @bodyParam profession string Example: Ingeniero
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
     * _show_: view information for a specific host
     *
     * @urlParam event_id required
     * @urlParam id required host id to be removed
     * 
     * @param  \App\Host  $Host
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        $Host = Host::findOrFail($id);
        $response = new JsonResource($Host);
        return $response;

    }
    /**
     * _update_: update the specified host.
     *
     * @urlParam event_id required
     * 
     * @bodyParam description string Example: <p>Es todo un profesional</p>
     * @bodyParam description_activity string Example: true
     * @bodyParam image string
     * @bodyParam name string Example: Primer conferencista
     * @bodyParam order number Example: 1
     * @bodyParam profession string Example: Ingeniero
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
     * _destroy_ : Remove the specified speaker.
     *
     * @urlParam event_id required
     * @urlParam id required host id to be removed
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