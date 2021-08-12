<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\ModelHasRole;
use App\RolesPermissions;
use App\Permission;
use App\Attendee;
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
        $userRol = '';

        if(Attendee::where('account_id' , $user->_id) !== null)
        {
            $userRol = Attendee::where('account_id' , $user->_id);                       
        }else{
            $userRol = ModelHasRole::where('model_id' , $user->_id);
        }
        
        switch ($urlParameter->parameterNames()[0]) {
            case 'event':
                $userRol = $userRol->where('event_id' ,$urlParameter->parameter('event'))->first(['rol_id', 'role_id', 'properties']);
                break;
            case 'organization':
                $userRol = $userRol->where('organization_id' ,$urlParameter->parameter('organization'))->first(['rol_id', 'role_id']);              
                break;
        }        
        
        if($userRol !== null)
        {    
            //Cono el usuario existe se busca los permisos que tiene el rol del usuario.
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

            //Esta segunda validación se hace para organizar mejor el código, ya que se separa  en roles_has_permissions la relación entre ambos
            // $permissionsUser = Permission::where('name', $permission)->first();    
            $permissionsRolUser = RolesPermissions::where('rol_id', $userRol->rol_id)->get();                                       
            
            foreach ($permissions as $permission) 
            {   
                foreach ($permissionsRolUser as $permissionUser) 
                {   
                    
                    //send_products_silentauctiomail                    
                    //return $permissionUser->permission->name;
                    if($permissionUser->permission->name === $permission )
                    {   
                        return $next($request);
                    }   
                } 
            }
        }
        throw abort(401 , 'UnauthorizedException');  
         
    }
}