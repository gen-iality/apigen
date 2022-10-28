<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
use App\WhereIs;
use Illuminate\Http\Request;

class WhereIsController extends Controller
{

    public function index()
    {
        $where_is = WhereIs::all();
        return response()->json($where_is);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'event_id' => 'required|string',
        ]);

        $event = Event::where('_id', $request->event_id)->first();

        if(isset($event->dynamics)){
            $dynamics = $event->dynamics;
            $dynamics["where_is"] = true;
        }else{
            $dynamics["where_is"] = true;
        }
        $event->dynamics = $dynamics;
        $event->save();

        $data = $request->json()->all();
        $where_is = new WhereIs($data);
        $where_is->save();

        return response()->json($where_is, 201);
    }

    public function WhereIsbyEvent(string $event_id)
    {
        $where_is = WhereIs::where('event_id', $event_id)->first();
        return $where_is;
    }

    public function show($where_is)
    {
        $where_is = WhereIs::findOrFail($where_is);

        return $where_is;
    }

    public function update(Request $request, $where_is)
    {
        $data = $request->json()->all();
        $where_is = WhereIs::findOrFail($where_is);
        $where_is->update($data);

        return response()->json($where_is, 200);
    }

    public function addOneResponse(Request $request, WhereIs $where_is)
    {
        $request->validate([
            'event_user_id' => 'required|string',
            'time' => 'required|numeric',
            'position' => 'required|numeric',
        ]);

        $data = $request->json()->all();
        $user_exist = Attendee::where('event_id', $where_is->event_id)
            ->where('_id', $data['event_user_id'])
            ->first();

        if (!isset($user_exist)) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $data['id'] = uniqid('');
        $data['name'] = $user_exist->properties['names'];
        //dd($data);

        $responses = isset($where_is->responses) ? $where_is->responses : [];
        array_push($responses, $data);
        $where_is->responses = $responses;
        $where_is->save();

        return response()->json($where_is, 200);
    }

    public function removeResponse(WhereIs $where_is, $response_id)
    {
        $responses = isset($where_is->responses) ? $where_is->responses : [];
        $new_responses = [];
        foreach ($responses as $response) {
            if ($response['id'] != $response_id) {
                array_push($new_responses, $response);
            }
        }
        $where_is->responses = $new_responses;
        $where_is->save();

        return response()->json($where_is, 200);
    }

    public function destroy($where_is)
    {

        $where_is = WhereIs::findOrFail($where_is);
        $event = Event::where('_id', $where_is->event_id)->first();
        if(isset($event->dynamics)){
            $dynamics = $event->dynamics;
            $dynamics["where_is"] = false;
        }else{
            $dynamics["where_is"] = false;
        }
        $event->dynamics = $dynamics;
        $event->save();
        $where_is->delete();

        return response()->json([], 204);
    }
}
