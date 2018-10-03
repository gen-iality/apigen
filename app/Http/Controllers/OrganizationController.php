<?php

namespace App\Http\Controllers;

use App\evaLib\Services\EvaRol;
use App\Http\Resources\OrganizationResource;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return OrganizationResource::collection(
            Organization::where('author', $request->get('user')->id)
                ->paginate(config('app.page_size'))
        );
        //return Organization::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EvaRol $RolService)
    {
        $data = $request->json()->all();
        $result = new Organization($data);
        $result->author = $request->get('user')->id;
        $result->save();
        $RolService->createAuthorAsOrganizationAdmin($request->get('user')->id, $result->_id);

        if (isset($data['category_ids'])) {
            $result->categories()->sync($data['category_ids']);
        }

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $id)
    {
        //
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $org)
    {
        //
        $data = $request->json()->all();
        $org->fill($data);
        $org->save();

        if (isset($data['category_ids'])) {
            $org->categories()->sync($data['category_ids']);
        }

        return $org;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
