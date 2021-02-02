<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

/**
 * @group Rol
 */
class RolController extends Controller
{
    /**
     * _index_: list Roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rol::all();
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
     * _store_: create a new rol
     * 
     * @bodyParam name string required
     * @bodyParam event_id string required 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $result = new Rol($request->json()->all());
        $result->save();
        return $result;
    }

    /**
     * _show_: information from a specific role 
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
    }

    /**
     * _update_: update the specified resource in storage.
     * 
     * @urlParam id id rol
     * 
     * @bodyParam name string required
     * @bodyParam event_id string required 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $id)
    {
        //
        $data = $request->json()->all();
        $id->fill($data);
        $id->save();
        return $id;
    }
    
    /**
     * _destroy_:Remove the specified resource from storage.
     * 
     * @urlParam id id rol
     * 
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
    }
}
