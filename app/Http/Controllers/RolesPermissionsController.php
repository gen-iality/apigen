<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Permission;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\RolesPermissions;
use Illuminate\Http\Resources\Json\JsonResource;

class RolesPermissionsController extends Controller
{
    /**
     * _index_: list all rolespermissions
     * @authenticated
     */
    public function index()
    {        
        return JsonResource::collection(
            RolesPermissionsController::paginate(config('app.page_size'))
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
     * _store_: create new rolespermissions
     * @authenticated
     * 
     * @bodyParam rol_id string required
     * @bodyParam permission_id string required
     */
    public function store(Request $request)
    {
        $eventUser = Attendee::create($request->json()->all());
        return new JsonResource($eventUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RolesPermissionsController  $rolesPermissionsController
     * @return \Illuminate\Http\Response
     */
    public function show(RolesPermissionsController $rolesPermissionsController)
    {        
        return new JsonResource($rolesPermissionsController);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RolesPermissionsController  $rolesPermissionsController
     * @return \Illuminate\Http\Response
     */
    public function edit(RolesPermissionsController $rolesPermissionsController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RolesPermissionsController  $rolesPermissionsController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolesPermissionsController $rolesPermissionsController)
    {
        //
        $data = $request->json()->all();
        $rolespermissions = $rolesPermissionsController;
        $rolespermissions->fill($data);
        $rolespermissions->save();
        return $rolespermissions;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RolesPermissionsController  $rolesPermissionsController
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolesPermissionsController $rolesPermissionsController)
    {
        //
        $rolespermissions = $rolesPermissionsController;
        $rolespermissions->delete();
    }

    /**
     * _addPermissionToRol_:
     * @authenticated
     * 
     * @urlParam rol required rol_id
     * 
     * @bodyParam module_name string required module name in prural Example: activities
     * @bodyParam permission_name string if you want create a permission diferen of CRUD addd permission name. 
     *  
     */
    public function addPermissionToRol(Request $request, $rol_id)
    {
        $data = $request->json()->all();

        $permission = Permission::updateOrCreate([
            'name' => $data['permission_name'],
            'module' => $data['module_name'],
            'guard_name' => 'web'
        ]); 
        

        //Se guardan los permisos en los roles por defecto
        //El rol de administador tendras todos los nuevo permisos que se creen
        //El rol de colaborador tendrá todos los permisos de update, list, show y create.
        $rolesdefault = ['Administrator' , 'Colaborator'];
        $roles = Rol::whereIn('name' , $rolesdefault)->get();
        

        foreach($roles as $role)
        {
            RolesPermissions::updateOrCreate(
                ["rol_id" => $role->_id,"permission_id" => $permission->_id],
            );
        }
        
        
        $roleUpdate = Rol::find($rol_id);
        
        return RolesPermissions::updateOrCreate(
            ["rol_id" => $roleUpdate->_id,"permission_id" => $permission->_id],
        );;

        //***********Este código comentado no va aquí per no eliminar  porque sirve para automatizar los roles**********
        // //Validar si se crea el crud o no
        // if($data['crud_resourse'])
        // {  
        //     $crudPermissions = [
        //         'list' => 'list_' . $data['module_name'],
        //         'show' => 'show_' .$data['module_name'],
        //         'create' => 'create_' .$data['module_name'],
        //         'update' => 'update_' .$data['module_name'] ,
        //         'destroy' =>'destroy_' .$data['module_name']
        //     ];            
            
        //     foreach($crudPermissionsas as $key => $value)
        //     {   
        //         $permission = Permission::updateOrCreate([
        //             'name' => $value,
        //             'module' => $data['module_name'],
        //             'guard_name' => 'web'
        //         ]);

        //         switch ($key) {
        //             case 'list':
        //                 RolesPermissions::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolAttendee->_id,"permission_id" => $permission->_id],
        //                 );
        //             break;
        //             case 'show':
        //                 RolesPermissions::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolAttendee->_id,"permission_id" => $permission->_id],
        //                 );
        //             break;
        //             case 'create':
        //                 RolesPermissions::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id,"permission_id" => $permission->_id],
        //                 );
        //             break;
        //             case 'update':
        //                 RolesPermissions::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id, "permission_id" => $permission->_id]
        //                 );
        //             break;
        //             case 'destroy':
        //                 RolesPermissions::updateOrCreate(["rol_id" => $rolAdmin->_id, "permission_id" => $permission->_id]);
        //             break;
        //         }

        //     }

        // }


    }
}
