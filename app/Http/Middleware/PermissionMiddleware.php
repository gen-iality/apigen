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

        $user = Auth::user();

        if ($user  === null) {
            throw UnauthorizedException::notLoggedIn();
        }    
       
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);

        $userRol = ModelHasRole::where('model_id' , $user->_id)->first(['rol_id']);
        
        $permissionsUser = Permission::where('role_ids', $userRol->rol_id)->get();
        

        
        foreach ($permissions as $permission) 
        {
            foreach ($permissionsUser as $permissionUser) 
            {
                
                if($permissionUser->name === $permission)
                {   
                    return $next($request);
                }    
            }
        }

        throw UnauthorizedException::forPermissions($permissions);   
    }
}
