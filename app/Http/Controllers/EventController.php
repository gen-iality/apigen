<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\EventUser;
use Storage;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $result = new Event($request->all());
        $disk = Storage::disk('gcs');        
        //$entityBody = file_get_contents('php://input');
        if(!is_null($request->file('picture'))){        
            $hola = $disk->put('evius/events', $request->file('picture'));
            Storage::disk('gcs')->setVisibility($hola, 'public');
            $result->picture = 'https://storage.googleapis.com/herba-images/'.$hola;
        }
        $result->author = $request->get('user')->uid;
        $result->save();
        
        $userEvt = [
            'userid' => $request->get('user')->uid,
            'event_id' => $result->_id
        ];
        var_dump($userEvt);
        $userToEvt = new EventUser($userEvt);
        
        $userToEvt->save();

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $id)
    {
        //
        $data = $request->all();
        $entityBody = file_get_contents('php://input');
        $disk = Storage::disk('gcs'); 
        //var_dump($request);
        if(count($request->file()) != 0){        
            $hola = $disk->put('evius/events', $request->file('picture'));
            Storage::disk('gcs')->setVisibility($hola, 'public');
            $data['picture'] = 'https://storage.googleapis.com/herba-images/'.$hola;
        }
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
}
