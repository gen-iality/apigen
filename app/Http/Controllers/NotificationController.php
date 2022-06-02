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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'status' => 'required|string'
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
