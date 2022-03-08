<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Attendee;
use App\PermissionEvent;
use Illuminate\Http\Request;
use App\RolesPermissions;
use Illuminate\Http\Resources\Json\JsonResource;

class RolesPermissionsEventController extends Controller
{
    /**
     * _index_: list all rolespermissions
     * @authenticated
     */
    public function index($event_id)
    {        
        return JsonResource::collection(
            RolesPermissionsEventEventController::paginate(config('app.page_size'))
        );
    }

    /**
     * _indexByRoles: list all permisos by rol
     * @authenticated
     */
    public function indexByRol($rol_id)
    {   
        $query = RolesPermissionsEvent::where('rol_id' , $rol_id);
        return JsonResource::collection($query->paginate(config('app.page_size')));
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
        $eventUser = RolesPermissions::updateOrCreate($request->json()->all());

        return new JsonResource($eventUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RolesPermissionsEventEventController  $rolesPermissionsController
     * @return \Illuminate\Http\Response
     */
    public function show(RolesPermissionsEventEventController $rolesPermissionsController)
    {        
        return new JsonResource($rolesPermissionsController);
    }
    
    /**
     * _update_: create new rolespermissions
     * @authenticated
     * 
     * @bodyParam rol_id string required
     * @bodyParam permission_id string required
     */
    public function update(Request $request, RolesPermissionsEventEventController $rolesPermissionsController)
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
     * @param  \App\RolesPermissionsEventEventController  $rolesPermissionsController
     * @return \Illuminate\Http\Response
     */
    public function destroy(RolesPermissionsEventEventController $rolesPermissionsController)
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
            RolesPermissionsEvent::updateOrCreate(
                ["rol_id" => $role->_id,"permission_id" => $permission->_id],
            );
        }
        
        
        $roleUpdate = Rol::find($rol_id);
        
        return RolesPermissionsEvent::updateOrCreate(
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
        //                 RolesPermissionsEvent::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolAttendee->_id,"permission_id" => $permission->_id],
        //                 );
        //             break;
        //             case 'show':
        //                 RolesPermissionsEvent::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolAttendee->_id,"permission_id" => $permission->_id],
        //                 );
        //             break;
        //             case 'create':
        //                 RolesPermissionsEvent::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id,"permission_id" => $permission->_id],
        //                 );
        //             break;
        //             case 'update':
        //                 RolesPermissionsEvent::updateOrCreate(
        //                     ["rol_id" => $rolAdmin->_id,"permission_id" => $permission->_id],
        //                     ["rol_id" => $rolColaborator->_id, "permission_id" => $permission->_id]
        //                 );
        //             break;
        //             case 'destroy':
        //                 RolesPermissionsEvent::updateOrCreate(["rol_id" => $rolAdmin->_id, "permission_id" => $permission->_id]);
        //             break;
        //         }

        //     }

        // }


    }
}
