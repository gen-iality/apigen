<?php

namespace App\Http\Controllers;
use App\Http\Resources\ModelHasRoleResource;
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
        $roles = Role::with('permissions')->get();
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
        $data = $request->json()->all();

        $ModelHasRole = ModelHasRole::findOrFail($id);
        $ModelHasRole->fill($data);
        $ModelHasRole->save();

        $response = new ModelHasRoleResource($ModelHasRole);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ModelHasRole = ModelHasRole::find($id);
        $res = $ModelHasRole->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
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
        // return $userData['email'];
        $email = $userData['email'];
        $matchAttributes = ['email' => $email];
        $user = User::updateOrCreate($eventUserData, $userData);
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
            return response()->json(['success'=>true]);
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
        $response = new ModelHasRoleResource($model);
        return $response;
    }

    /**
     * Create usersRolesEvent
     * Controller show the users with your roles 
     * role_id
     * model_id (user_id) 
     * event_id
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function usersRolesEvent($id){
        
        $usersRolesEvent = ModelHasRole::where('event_id', $id)->get();
        return  $usersRolesEvent;

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
    public function mePermissionsEvent(Request $request, $event_id){
        
        $user = $request->get('user');
        $userPermissions = ModelHasRole::where('event_id', $event_id)->where('model_id',$user->id)->first();
        if(isset($userPermissions))
        {
            $role = Role::select('permissions')->where('name',$userPermissions->role->name)->with('permissions')->first();
            return  $role->permissions;
        }else{
            return [];
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
    public function myEvents(Request $request){

        $user = $request->get('user');
        $userPermissions = ModelHasRole::where('model_id',$user->id)->with('event')->get();
        
        return  $userPermissions?$userPermissions:[];
    }


}