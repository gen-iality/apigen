<?php

namespace App\Http\Controllers;

use App\evaLib\Services\EvaRol;
use App\evaLib\Services\GoogleFiles;
use App\Event;
use App\Properties;
use Illuminate\Http\Request;
use Storage;
/**
 * @resource Event 
 *
 * 
 */
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //return response()->json(Event::all());
        //return Event::all();
        return Event::where('author', $request->get('user')->uid)->get();
    }

    /**
     * Return all public events
     */
    public function publicEvents(Request $request)
    {
        return Event::all();
    }

    public function getOnePublicEvent(Event $id)
    {
        return $id;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function delete(Event $id)
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
    public function store(Request $request, GoogleFiles $gfService, EvaRol $RolService)
    {
        $result = new Event($request->all());
        $result->picture = $gfService->storeFile($request->file('picture'));
        $result->author = $request->get('user')->uid;
        $result->save();

        $RolService->createAuthorAsEventAdmin($request->get('user')->uid, $result->_id);

        return $result;
        //$data= $request->get('user');
        //return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $id)
    {
        //
        //return Event::findOrFail($id);
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }
    /**
     * Simply testing service providers
     *
     * @param GoogleFiles $gfService
     * @return void
     */
    public function test(GoogleFiles $gfService)
    {
        echo $gfService->doSomethingUseful();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $id, GoogleFiles $gfService)
    {
        $data = $request->all();
        //@debug post $entityBody = file_get_contents('php://input');

        //$data['picture'] =  $gfService->storeFile($request->file('picture'));

        $id->fill($data);
        $id->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
    /**
     * AddUserProperty: Add dynamic user property to the event
     * 
     * each dynamic property must be composed of following parameters:
     * 
     * * name     text 
     * * required boolean
     * * type     text
     * 
     * Once created user dynamic event properties could be get directly from $event->userProperties.
     *    Dynamic properties are returned inside each UserEvent like regular properties
     * @param Event $event
     * @param array $properties
     * @return void
     */
    public function addUserProperty(Request $request, $event_id)
    {
        $event = Event::find($event_id);
        $property = $event->userProperties()->create($request->all());
        return $property->toArray();
    }
}
