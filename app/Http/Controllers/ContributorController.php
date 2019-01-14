<?php

namespace App\Http\Controllers;
use App\Http\Resources\ModelHasRoleResource;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Account;
use App\ModelHasRole;
use App\Attendee;
use App\Event;
use Auth;

class ContributorController extends Controller
{




    /**
     * Display a listing of the contributors of an event resource.
     * 
     * @param  String $event_id
     * @return \Illuminate\Http\Response Contributors Resources Collections
     */
    public function index(String $event_id){
        $usersRolesEvent = ModelHasRole::where('event_id', $event_id)->get();
        return ModelHasRoleResource::collection($usersRolesEvent);
    }

    /**
     * Metadata Controller
     * 
     * 
     * @return \Illuminate\Http\Response Resources
     * @return \Illuminate\Http\Response Contributors Resources Collections
     */
    public function metadata_roles(Request $request)
    {
        $roles = Role::all();
        return  $roles;
    }

    /**
     * Store
     * 
     * | Body Params   |
     * | ------------- |
     * | @body $_POST[role_id] required field       |
     * | @body $_POST[event_id]  required field     |
     * | @body $_POST[model_id] required field      |  
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Contributors Resources
     */
    public function store(Request $request)
    {
        $rol = $request->json()->all();        

        //find or create user
        if (!isset($rol['model_id'])){
            if(isset($rol['properties'])){
                $email = $rol['properties']['email'];
                $matchAttributes = ['email' => $email];
                $user = Account::updateOrCreate($matchAttributes, $rol['properties']);
                $rol['model_id'] = $user->id;
            }else{
                throw new Exception("model_id and properties are mandatory", 1);                
            }
        }

        //add the user as contributor to the event with the specific rol
        $rol['model_type'] = "App\Account";
        $matchAttributesRol = [
         "role_id" => $rol['role_id'],
         "model_id" => $rol['model_id'],
         "event_id" => $rol["event_id"] 
        ];
        $model = ModelHasRole::updateOrCreate($matchAttributesRol, $rol);
        $response = new ModelHasRoleResource($model);
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  String  $id
     * @return \Illuminate\Http\Response Contribuitors resources 
     */
    public function show(String $id)
    {
        $ModelHasRole = ModelHasRole::findOrFail($id);
        return new ModelHasRoleResource($ModelHasRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * | Body Params   |
     * | ------------- |
     * | @body $_POST[role_id] required field       |
     * | @body $_POST[event_id]  required field     |
     * | @body $_POST[model_id] required field      |
     * 
     * @param  String  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response Contributors Resource
     */
    public function update(Request $request, String $id)
    {
        $data = $request->json()->all();
        $ModelHasRole = ModelHasRole::findOrFail($id);
        $ModelHasRole->fill($data);
        $ModelHasRole->save();
        return new ModelHasRoleResource($ModelHasRole);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $id
     * @return \Illuminate\Http\Response true
     */
    public function destroy(String $id)
    {
        $ModelHasRole = ModelHasRole::findOrFail($id);
        return (string)$ModelHasRole->delete();
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
    public function meAsContributor(Request $request, String $event_id){

        $user = Auth::user();
        $userPermissions = ModelHasRole::where('event_id', $event_id)->where('model_id',$user->id)->latest()->first();
        
        if(($userPermissions && $userPermissions->role))
        {
            return $userPermissions->role->permissions;
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

        $user = Auth::user();
        $events = Event::with('userPermissions')->where('author_id', $user->id)->get();
        return  $events? ModelHasRoleResource::collection($events) : [];
    }
}