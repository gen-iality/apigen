<?php

namespace App\Http\Controllers;

use App\EventUser;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $usersfilter = function($data){
            $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
            $auth = $firebase->getAuth();
            //return $auth->getUser($data->userid);
        };
        $evtUsers = EventUser::where('event_id', $id)->get();
        $users = array_map($usersfilter, $evtUsers->all());        
        return $users;
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

    public function testing()
    {
        //
        $usersfilter = function($data){
        };
        $serviceAccount = ServiceAccount::fromJsonFile(base_path('firebase_credentials.json'));
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $auth = $firebase->getAuth();
        return $auth->getUserByEmail("apps@mocionsoft.222com");
        /* $evtUsers = EventUser::where('event_id', $id)->get();
        $users = array_map($usersfilter, $evtUsers->all());        
        return $users; */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $request;
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function show(EventUser $eventUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EventUser $eventUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventUser $eventUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventUser  $eventUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventUser $eventUser)
    {
        //
    }
}
