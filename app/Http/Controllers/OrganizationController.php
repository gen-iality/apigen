<?php

namespace App\Http\Controllers;

use App\evaLib\Services\EvaRol;
use App\Http\Resources\OrganizationResource;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{



    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function meOrganizations(Request $request)
    {
        return OrganizationResource::collection(
            Organization::where('author', $request->get('user')->id)
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return OrganizationResource::collection(
            Organization::paginate(config('app.page_size'))
        );
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
        $model = new Organization($data);
        $model->author = $request->get('user')->id;
        $model->save();

        $user = $request->get('user');

    
        $RolService->createAuthorAsOrganizationAdmin($request->get('user')->id, $model->_id);

        if (isset($data['category_ids'])) {
            $model->categories()->sync($data['category_ids']);
        }

        return new OrganizationResource($model);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return new OrganizationResource($organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $organization_id)
    {
        $organization = Organization::findOrFail($organization_id);
        $data = $request->json()->all();
        $org->fill($data);
        $org->save();

        if (isset($data['category_ids'])) {
            $org->categories()->sync($data['category_ids']);
        }
        return new OrganizationResource($org);
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
