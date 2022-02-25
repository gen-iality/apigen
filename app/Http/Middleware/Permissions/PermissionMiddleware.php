<?php

namespace App\Http\Middleware\Permissions;

use Closure;
use Auth;
use App\OrganizationUser;
use App\ModelHasRole;
use App\RolesPermissions;
use App\Permission;
use App\Attendee;
use App\Rol;
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
        
        //Se valida el rol del usuario, y el evento u organización que puede editar.               
        $userRol = '';

            
        //Validar parámetros de url
        $urlParameter = $request->route();
        
        //Separar los permisos para el endpoint
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);   

        switch ($urlParameter->parameterNames()[0]) {
            case 'event':
                $userRol = Attendee::where('account_id' , $user->_id)->where('event_id' ,$urlParameter->parameter('event'))->first(['rol_id', 'properties']);
                break;
            case 'organization':
                $userRol = OrganizationUser::where('account_id' , $user->_id)->where('organization_id' ,$urlParameter->parameter('organization'))->first(['rol_id', 'role_id']);            
                break;
        }        

        
        $rol = isset($userRol) ? Rol::find($userRol->rol_id) : null;

        if(($rol) && $rol->type === 'admin')
        {    
            $permissionsRolUser = RolesPermissions::whereHas('permission', function($query) use ($permissions)
            {
                $query->whereIn('name', $permissions);
            
            })->where('rol_id' , $userRol->rol_id)->first();

            if($permissionsRolUser ==! null)
            {
                return $next($request);
            }
        }
    

        throw abort(401 , "You don't have permission for do this action.");    

         
    }
}