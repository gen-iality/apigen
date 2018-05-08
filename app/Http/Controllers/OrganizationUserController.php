<?php

namespace App\Http\Controllers;

use App\OrganizationUser;
use Illuminate\Http\Request;

class OrganizationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return OrganizationUser::all();
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
        $result = new OrganizationUser($request->all());
        $result->save();
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationUser $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationUser $organizationUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationUser $id)
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
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationUser $organizationUser)
    {
        //
    }
}
