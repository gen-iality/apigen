<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;
use Validator;
/**
 * @group RolEvent
 */
class RolOrganizationController extends Controller
{   
    const AVALIABLE_TYPES = 'attendee,administrator';
    const AVALIABLE_PERMISSIONS = 'list, show, update, create, destroy';

    /**
     * _index_: list roles by event.
     * @authenticated
     * 
     * @urlParam event required event id 
     *
     */
    public function index()
    {
        $roles = RolEvent::all();
        return JsonResource::collection($roles);
    }

    
    /**
     * _store_: create a new rol
     * @authenticated
     * 
     * @urlParam organization required organization id
     * 
     * @bodyParam name string required name of the role
     * @bodyParam type string required
     * @bodyParam module required string This indicate management in to organization  organization defaul value. 
     * 
     */
    public function store($organization_id , Request $request)
    {
        //
        $rules = $request->validate([
            'name' => 'required'
        ]);
        $data = $request->json()->all();
        $data['module'] = 'organization';
        $data['organization_id'] = $organization_id;
              
        $result = new Rol($data);
        $result->save();
        return $result;
    }

    /**
     * _show_: information from a specific role 
     *
     * @param  \App\RolEvent  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(RolEvent $id)
    {
        //
        return $id;
    }

    /**
     * _show_: information from a specific role 
     *
     * @param  \App\RolEvent  $rol
     * @return \Illuminate\Http\Response
     */
    public function showRolPublic(RolEvent $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RolEvent  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(RolEvent $rol)
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
     * @param  \App\RolEvent  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolEvent $id)
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
     * @param  \App\RolEvent  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolEvent $rol)
    {
        //
    }

    /**
     * 
     */
    public function crearPermisosRolEvent(Request $request)
    {
        $data = $request->json()->all();
        $rolAdmin = RolEvent::where('name' , 'Administrador')->first();
        
        $permission = new Permission($data);
        $permission->save();
        $permission->role_ids = [$rolAdmin->_id];
        $permission->save();


        $rolInPermission = $rolAdmin->permission_ids;
        array_push($rolInPermission , $permission->_id );
        $rolAdmin->permission_ids = $rolInPermission;
        $rolAdmin->save();
    }

    /**
     * 
     */
    public function assignPermisosRolEvent(Request $request)
    {
        $data = $request->json()->all();

        $permissions = Permission::where('name', 'like', '%'.$data['type_permission'].'%')->get();        
        $rol = RolEvent::where('name' , $data['rol_name'])->first();
        
        if(!isset($rol))
        {   
            $dataRolEvent = [
                'name' => $data['rol_name'],
                'guard_name' => 'web'
            ];
            $rol = new RolEvent($dataRolEvent);
            $rol->save();
        }        

        $rolInPermission = $rol->permission_ids;

        foreach($permissions as $permission)
        {  
            $permissonInRolEvent = $permission->role_ids;    
            
            if(array_search($rol->_id, $permissonInRolEvent) === false)
            {
                var_dump('Entrada');
                array_push($permissonInRolEvent , $rol->_id );
                $permission->role_ids = $permissonInRolEvent;
                $permission->save(); 
            }

            // $permission->save();

            if(array_search($permission->_id, $rol->permission_ids) === false)
            {   
                var_dump('Entrada1');
                array_push($rolInPermission , $permission->_id );
                $rol->permission_ids = $rolInPermission;
                $rol->save(); 
            }

              
        }           

        return $rol;
    }

    

}