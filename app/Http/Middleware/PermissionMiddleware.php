<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\ModelHasRole;
use App\Permission;
use Spatie\Permissionn\Exceptions\UnauthorizedException;

class PermissionMiddleware

{
    public function handle($request, Closure $next, $permission)
    {   
        dd($request->route());
        $user = Auth::user();

        if ($user  === null) {
            throw UnauthorizedException::notLoggedIn();
        }    
       
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);
                
        $userRol = ModelHasRole::where('model_id' , $user->_id)
                    ->where('event_id' , $request->route()->parameter('event'))
                    ->first(['rol_id']);


        if($userRol !== null)
        {    
            $permissionsUser = Permission::where('role_ids', $userRol->rol_id)->get();   
                            
            
            foreach ($permissions as $permission) 
            {   
                foreach ($permissionsUser as $permissionUser) 
                {   
                    $permissionAccepted = $permissionUser::where('name' ,$permission)->first();    
                               
                    if($permissionAccepted !== null)
                    {   
                        return $next($request);
                    }  
                } 
            }
        }
        throw UnauthorizedException::forPermissions($permissions);  
         
    }
}
