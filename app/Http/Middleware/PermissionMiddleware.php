<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
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

        if(Attendee::where('account_id' , $user->_id) !== null)
        {
            $userRol = Attendee::where('account_id' , $user->_id);                       
        }
            
        //Validar parámetros de url
        $urlParameter = $request->route();
        
        //Separar los permisos para el endpoint
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);   

        switch ($urlParameter->parameterNames()[0]) {
            case 'event':
                $userRol = $userRol->where('event_id' ,$urlParameter->parameter('event'))->first(['rol_id', 'role_id', 'properties']);
                break;
            case 'organization':
                $userRol = $userRol->where('organization_id' ,$urlParameter->parameter('organization'))->first(['rol_id', 'role_id']);              
                break;
        }        
        $rol = ($userRol !== null) ? Rol::find($userRol->rol_id) : null;

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