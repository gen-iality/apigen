<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();
        return response()->json($notifications);
    }

    /**
     * _store_: Create new Notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @bodyParam message string required message to notification Example: Speakers limit reached
     * @bodyParam status string required status of notification Example: ACTIVE || INACTIVE
     * @bodyParam user_id string required user related to notification Example: 628fdc698b89a10b9d464793
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'status' => 'required|string',
            'user_id' => 'required|string'
        ]);

        $data = $request->json()->all();
        $notification = new Notification($data);
        $notification->save();

        return response()->json($notification, 201);
    }
    /**
     * NotificationbyUser_: search of notifications by user.
     * 
     * @urlParam user required  user_id
     *
     */
    public function NotificationbyUser(string $user_id)
    {
        return NotificationResource::collection(
            Notification::where('user_id', $user_id)
                ->where('status', '=', 'ACTIVE')
                ->latest()
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show($notification)
    {
        $notification = Notification::findOrFail($notification);

        return $notification;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $notification)
    {
        $data = $request->json()->all();
        $notification  = Notification::findOrFail($notification);
        $notification->fill($data);
        $notification->save();

        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy($notification)
    {
        $notification = Notification::findOrFail($notification);
        $notification->delete();

        return response()->json([], 204);
    }
}
