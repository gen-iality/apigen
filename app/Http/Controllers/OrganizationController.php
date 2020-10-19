<?php

namespace App\Http\Controllers;

use App\evaLib\Services\EvaRol;
use App\Http\Resources\OrganizationResource;
use App\Organization;
use App\Event;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use Auth;

/**
 * @group Organization
 */
class OrganizationController extends Controller
{
    /**
     * _meOrganizations_: List the organizations of the logged-in user.
     * Listar las organizaciones del usuario logueado
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function meOrganizations(Request $request)
    {
        return OrganizationResource::collection(
            Organization::where('author', Auth::user()->id)
                ->paginate(config('app.page_size'))
        );
    }

    /**
     *  _index_:Display a listing of the organizations.
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
     * _store_:Store a newly created resource in organizations.
     * 
     * @bodyParam properties[name,email] array 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EvaRol $RolService)
    {
        $data = $request->json()->all();

        /* Se le agregan campos obligatorios a la organizaci�n*/

            if(isset($data['properties'])){ 
                $data['properties'] += [
                    ["name" => "email", "unique" => false, "mandatory" => false,"type" => "email"],
                    ["name" => "names", "unique" => false, "mandatory" => false,"type" => "text"]
                ];
            }else{
                $data['properties'] = [
                    ["name" => "email", "unique" => false, "mandatory" => false,"type" => "email"],
                    ["name" => "names", "unique" => false, "mandatory" => false,"type" => "text"]
                ];
            } 

        $model = new Organization($data);
        // return response($model);
        $model->author = Auth::user()->id;

        $user = Auth::user();

        $RolService->createAuthorAsOrganizationAdmin(Auth::user()->id, $model->_id);
        
        $model->save();
        
        if (isset($data['category_ids'])) {
            $model->categories()->sync($data['category_ids']);
        }
        
        
        return new OrganizationResource($model);
    }


    /**
     * _show_: Display the specified organization.
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
     * _update_: Update the specified resource in organization.
     *
     * @urlParam organization_id required
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $organization_id)
    {
        $organization = Organization::findOrFail($organization_id);
        $data = $request->json()->all();
       
        $organization->fill($data);

        
        $organization->save();

        if (isset($data['category_ids'])) {
            $organization->categories()->sync($data['category_ids']);
        }
        return new OrganizationResource($organization);
    }

    /**
     * _destroy_: Remove the specified organization from storage.
     *
     * @urlParam organization_id required
     * 
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $res = $organization->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }


    
}
