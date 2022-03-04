<?php

namespace App\Http\Controllers;

use App\Rol;
use App\Event;
use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Validation\Rule;
use Validator;
use App\evaLib\Services\FilterQuery;

/**
 * @group RolEvent
 */
class RolEventController extends Controller
{   
    const AVALIABLE_TYPES = ['attendee', 'admin'];
    const AVALIABLE_PERMISSIONS = 'list, show, update, create, destroy';

    /**
     * _index_: list roles by event.
     * @authenticated
     * 
     * @urlParam event required event id 
     *
     */
    public function index($event_id, FilterQuery $filterQuery)
    {   
        $input = $request->all();
        $rolEvent = Rol::where('event_id' , $event_id)->get();

        // This query return the default roles in the systme, this roles are going to in every events.
        $query = Rol::where('module' , Rol::MODULE_SYSTEM)->get();
        $roles = $rolEvent->concat($rolesSystem);
        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $input);
        return JsonResource::collection($results);
    }

    
    /**
     * _store_: create a new rol
     * @authenticated
     * 
     * @urlParam event required event id
     * 
     * @bodyParam name string required Rol name
     * @bodyParam type string required The type can be attendee or admin 
     * 
     * 
     */
    public function store(Request $request, $event_id)
    {   
        //
        $data = $request->json()->all(); 
        $rules = [
            'name' => 'required|unique:roles,name,NULL,id,modeltable_id,' . $event_id,
            'type' => ["required", Rule::in(RolEventController::AVALIABLE_TYPES)]
        ];
        //Standardize role names
        $data['name'] =  ucfirst(strtolower($data['name']));   

        $messages = [
            'in' => "Type should be one of: " . implode(", ", RolEventController::AVALIABLE_TYPES),           
        ];
        $validator = Validator::make($data, $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }
   
        $event = Event::find($event_id);
        $data['event_id'] = $event_id;

        $result = $event->rols()->create($data);
            
        // $result->save();
        return $result;
    }

    /**
     * _show_: information from a specific role 
     * @authenticated
     * 
     * @urlParam event required event id
     * @urlParam rolevent required rol id
     */
    public function show($event_id , Rol $id)
    {   
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
     * _update_: update the specified resource in storage.
     * @authenticated
     * 
     * @urlParam event required event id
     * @urlParam rolevent required rol id
     * 
     * @bodyParam name string Rol name
     * @bodyParam type string The type can be attendee or admin 
     * 
     */
    public function update(Request $request, $event_id, $rol_id)
    {
        //
        $data = $request->json()->all(); 
        $rules = [
            'name' => 'unique:roles,name,NULL,id,modeltable_id,' . $event_id,
            'type' => [Rule::in(RolEventController::AVALIABLE_TYPES)]
        ];
        //Standardize role names
        $data['name'] =  ucfirst(strtolower($data['name']));   

        $messages = [
            'in' => "Type should be one of: " . implode(", ", RolEventController::AVALIABLE_TYPES),           
        ];
        $validator = Validator::make($data, $rules, $messages);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }
        
        $rol = Rol::find($rol_id);
        $rol->fill($data);
        $rol->save();
        return $rol;
    }
    
    /**
     * _destroy_: if the roll is not used for none user you can remove them.
     * 
     * @urlParam event required event id
     * @urlParam rolevent required rol id
     */
    public function destroy(Request $request, $event_id, $rol_id)
    {
        $eventUser = EventUser::where('rol_id' , $rol_id)->where('event_id' , $event_id)->first();
        
        if(!isset($eventUser)){            
            RolPermissions::where("rol_id", $rol_id)->delete();
            $rol = Rol::find($rol_id);
            return (string )$rol->delete();
        }else{
            return response()->json([
                "message" => "You can't delete this role because there are users using it"
            ], 403);
        }
    }

    /**
     * 
     */
    public function crearPermisosRolEvent(Request $request)
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
    public function assignPermisosRolEvent(Request $request)
    {
        $data = $request->json()->all();

        $permissions = Permission::where('name', 'like', '%'.$data['type_permission'].'%')->get();        
        $rol = Rol::where('name' , $data['rol_name'])->first();
        
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