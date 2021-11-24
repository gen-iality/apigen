<?php

namespace App\Http\Controllers;

use App\Permission;
use App\AttendeTicket;
use App\Event;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return JsonResource::collection(
            Permission::paginate(config('app.page_size'))
        );
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
        //
        $result = new Permission($request->json()->all());
        $result->guard_name = 'web';
        $result->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return new JsonResource($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->json()->all();
        $permissions = $permission;
        $permissions->fill($data);
        $permissions->save();
        return $permissions;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    public function getUserPermissionByEvent(Request $request,$id){
        $rol = AttendeTicket::where('event_id', $id)
                                    ->where('user_id', $request->get('user')->id)->firstOrFail();
        $permissions = Rol::find($rol->rol_id);
        return $permissions;
    }
}
