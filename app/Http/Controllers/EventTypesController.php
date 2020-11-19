<?php

namespace App\Http\Controllers;
use App\Http\Resources\EventTypesResource;
use Illuminate\Http\Request;
use App\EventType;
use App\Event;
use Storage;
use Spatie\ResponseCache\Facades\ResponseCache;

class EventTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EventTypesResource::collection(
            EventType::paginate(config('app.page_size')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $result = new EventType($data);
        $result->save();
        ResponseCache::clear();



        return $result;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(EventType $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        //
        $EventType = EventType::find($id);
        $response = new EventTypesResource($EventType);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $EventType = EventType::find($id);
        $EventType->fill($data);
        $EventType->save();
        ResponseCache::clear();

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventType = EventType::find($id);
        $res = $eventType->delete();
        ResponseCache::clear();
        
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }
}
