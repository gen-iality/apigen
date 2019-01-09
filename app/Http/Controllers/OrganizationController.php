<?php

namespace App\Http\Controllers;

use App\evaLib\Services\EvaRol;
use App\Http\Resources\OrganizationResource;
use App\Organization;
use App\Event;
use App\Http\Resources\EventResource;
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
        // return response($model);
        $model->author = $request->get('user')->id;

        $user = $request->get('user');

        $RolService->createAuthorAsOrganizationAdmin($request->get('user')->id, $model->_id);
        
        $model->save();
        
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
       
        $organization->fill($data);

        
        $organization->save();

        if (isset($data['category_ids'])) {
            $organization->categories()->sync($data['category_ids']);
        }
        return new OrganizationResource($organization);
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


        /**
     * AddUserProperty: Add dynamic user property to the event
     *
     * each dynamic property must be composed of following parameters:
     *
     * * name     text
     * * required boolean - this field is not yet used  for anything
     * * type     text    - this field is not yet used for anything
     *
     * Once created user dynamic event properties could be get directly from $event->userProperties.
     * Dynamic properties are returned inside each UserEvent like regular properties
     * @param Event $event
     * @param array $properties
     * @return void
     */
    public function addUserProperty(Request $request, $id)
    {
        
        $event = Organization::find($id);
        $event_properties = $event->user_properties;
        $count = count($event_properties);
        $fields = [ $count => ["name" => $request->name, "unique" => false, "mandatory" => false,"type" => "text"]];
        $event->user_properties += $fields;
        $event->save();
        return $event->user_properties;
    }


    
}
