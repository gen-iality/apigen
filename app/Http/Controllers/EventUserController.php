<?php

namespace App\Http\Controllers;

use App\evaLib\Services\UserEventService;
use App\Event;
use App\EventUser;
use App\Http\Resources\EventUserResource;
use App\Rol;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Handles behavior realated to user booking into an event
 *
 * User relation to an event is on of the fundamental aspects of this platform
 * most of the user functionality is executed under "EventUser" model and not directly
 * under User, because is an events platform.
 */
class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $usersfilter = function ($data) {
            $temporal = $data;
            $temporal->user = User::where('uid', $data->userid)->first();
            $temporal->state_id = $data->state;
            $temporal->rol_id = $data->rol;

            return $temporal;
        };
        $evtUsers = EventUser::where('event_id', $id)->get();
        $users = array_map($usersfilter, $evtUsers->all());

        return $users;

    }
    /**
     * Tries to create a new user from provided data and then add that user to specified event
     *
     * @param Request $request HTTP request
     * @param string  $event_id to add the user to.
     * 
     * @uses $_POST[email] required field
     * @uses $_POST[name]  
     * @uses $_POST[other_params],... any other params send will be saved in user and eventUser
     * 
     * @return EventUserResource
     */
    public function createUserAndAddtoEvent(Request $request, string $event_id)
    {
        try {
            $event = Event::find($event_id);
            $userData = $request->all();
            $result = UserEventService::importUserEvent($event, $userData);

            $response = new EventUserResource($result->data);
            $response->additional(['status' => $result->status, 'message' => $result->message]);
        } catch (\Exception $e) {
            $response = response()->json((object) ["message" => $e->getMessage()], 500);
        }
        return $response;
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
        $data = $request->all();
        $id->fill($data);
        $id->save();
        return $data;
    }

/**
 * Undocumented function
 *
 * @param int $id
 * @return boolean success result
 */

    public function checkIn($id)
    {
        $eventUser = EventUser::find($id);
        return $eventUser->checkIn();

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
