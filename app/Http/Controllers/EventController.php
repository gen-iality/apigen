<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return response()->json(Event::all());
        return Event::all();
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
        $disk = Storage::disk('gcs');        
        $entityBody = file_get_contents('php://input');
        if (Storage::exists('file.jpg'))
        {
            var_dump('EXISTE!!!!');
        }else{
            var_dump('CERADO!!!!',$_FILES['picture']['tmp_name']);
            $disk->put('avatars/file.png', $_FILES['picture']);
        }
        var_dump($_POST);
        var_dump($_FILES);   
        var_dump($_REQUEST);  
        var_dump($entityBody);
        var_dump($_SERVER);
        var_dump("----------------------------------aacacacac----------------------------------");
        var_dump($request->all());  
        var_dump("///////////////////////");
        /* $disk->put('avatars/1.png', $fileContents);
        $url = $disk->url('folder/my_file.txt'); */
        /* var_dump($url); */
        
        return "ok";


        //        
        /* $result = new Event($request->all());
        $result->author = $request->get('user')->uid;
        $result->save(); */
        //return $request->all();
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
        $id->fill($data);
        $id->save();
        return $id;
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
