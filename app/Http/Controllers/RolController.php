<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
use App\Permission;

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
     * 
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

    /**
     * 
     */
    public function crearPermisosRol(Request $request)
    {
        $data = $request->json()->all();
        $rolAdmin = Rol::where('name' , 'Administrador')->first();
        
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
    public function assignPermisosRol(Request $request)
    {
        $data = $request->json()->all();

        $permissions = Permission::where('name', 'like', '%'.$data['type_permission'].'%')->get();        
        $rol = Rol::where('name' , $data['rol_name'])->first();
        
        if(!isset($rol))
        {   
            $dataRol = [
                'name' => $data['rol_name'],
                'guard_name' => 'web'
            ];
            $rol = new Rol($dataRol);
            $rol->save();
        }        

        $rolInPermission = $rol->permission_ids;

        foreach($permissions as $permission)
        {  
            $permissonInRol = $permission->role_ids;    
            
            if(array_search($rol->_id, $permissonInRol) === false)
            {
                var_dump('Entrada');
                array_push($permissonInRol , $rol->_id );
                $permission->role_ids = $permissonInRol;
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