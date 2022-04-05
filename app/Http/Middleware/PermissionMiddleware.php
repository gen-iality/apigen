<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\ModelHasRole;
use App\Permission;
use Spatie\Permissionn\Exceptions\UnauthorizedException;
use Illuminate\Auth\AuthenticationException;
class PermissionMiddleware

{
    public function handle($request, Closure $next, $permission)
    {   
        //Usuario autenticado
        $user = Auth::user();
        
        if ($user  === null) {
            throw new AuthenticationException("No token provided. Unauthenticated");
        }    

        //Validar parámetros de url
        $urlParameter = $request->route();

        //Separar los permisos para el endpoint
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);
        
        //Se valida el rol del usuario, y el evento u organización que puede editar.
        $userRol = ModelHasRole::where('model_id' , $user->_id);

        
        switch ($urlParameter->parameterNames()[0]) {
            case 'event':
                $userRol = $userRol->where('event_id' ,$urlParameter->parameter('event'))->first(['rol_id', 'role_id']);
                break;
            case 'organization':
                $userRol = $userRol->where('organization_id' ,$urlParameter->parameter('organization'))->first(['rol_id', 'role_id']);              
                break;
        }        
        

        if($userRol !== null)
        {    
            //Cono el usuario existe se busca los permisos que tiene el rol del usuario.
            $permissionsUser = Permission::where('role_ids', $userRol->role_id)->get();                               
            
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
        throw abort(401 , 'UnauthorizedException');  
         
    }
}
