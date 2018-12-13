<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\User;
use App\ModelHasRole;
use App\EventUser;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();
        return $roles;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Create User and model_has_role
     * role_id
     * model_id (user_id) 
     * event_id
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateAndAddRolePermissions(Request $request)
    {
        $eventUserData = $request->json()->all();

            $userData = $request->json()->all();
            if (isset($eventUserData['properties'])) {
                $userData = $eventUserData['properties'];
            }
        
        $email = $userData['email'];
        $matchAttributes = ['email' => $email];
        $user = User::updateOrCreate($eventUserData);
        $id_user = $user->id;
        $event_id = $user->event_id;
        $role_id  = $user->role_id;
        if($user){

            $data = $request->json()->all();
            $app_user =     ["event_id" => $event_id,
                            "model_id" => $id_user ,
                            "role_id" => $role_id,
                            "model_type" => "App\User"];
            $role = $app_user;
            $model = ModelHasRole::create($role);
            return $role;
        }else{
            return 'error';
        }
    }

    /**
     * Create model_has_role
     * role_id
     * model_id (user_id) 
     * event_id
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addRolePermissions(Request $request)
    {
        $data = $request->json()->all();
        $app_user = ["model_type" => "App\User"];
        $role = $data += $app_user;
        $model = ModelHasRole::create($role);
        return $model;
    }
}


/*


        $role = Role::find($role_id);
        $user = User::find($user_id);
        return $user->role();
        // $user->assignRole('Administrator');
        
        return Role::find();
        return Role::all();

        // return $request;
        // Role::create(['name' => 'writer']);
        // Permission::create(['name' => 'edit articles']);
        $role = Role::find('5c080634f33bd4188832dfa6');
        $permission = Permission::create(['name' => 'edit articles']);
        $permissionB = Permission::create(['name' => 'deleted articles']);
        $permissionC = Permission::create(['name' => 'new articles']);

        $role->givePermissionTo($permission);
        $role->givePermissionTo($permissionB);
        $role->givePermissionTo($permissionC);

        return $role;

*/