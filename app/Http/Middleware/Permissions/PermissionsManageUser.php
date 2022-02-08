<?php
namespace App\Http\Middleware\Permissions;

use Closure;
use Auth;
use App\Attendee;
use App\OrganizationUser;
use App\Rol;
use App\RolesPermissions;

/**
 * Este moddleware realiza la administracion que tiene que ver con los usuario en eventUser, 
 * estos son diferentes que los administradores pueden cambiar la información de algunos usuarios y 
 * a su vez los usuarios pueden cambiar su propia información, pero no la de otros usuarios.
 *  
 */
class PermissionsManageUser
{
    public function handle($request, Closure $next, $permission)
    {
        //Usuario autenticado
        $user = Auth::user();
        
        if ($user  === null) {
            throw new AuthenticationException("No token provided. Unauthenticated");
        } 
        

        $rolAdministrator = Rol::ID_ROL_ADMINISTRATOR;

        //Separar los permisos para el endpoint
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);   

        $route = $request->route();

        $data = $request->json()->all();

        //Validate EventUser

        //User que se va a editar
        $userToEdit = '';

        //Rol del usuario que edita
        $editingUser = '';

        $adminsavailable = null;
        switch ($route->parameterNames()[0]) {
            case 'event':

                $userToEdit = Attendee::find($route->parameter("eventuser"));

                $editingUser = Attendee::where('account_id' , $user->_id)
                                ->where('event_id' ,$route->parameter('event'))
                                ->first(['rol_id', 'properties']);

                $adminsavailable = Attendee::where('event_id', $route->parameter('event'))
                                    ->where('rol_id' , $rolAdministrator)
                                    ->get();

                break;

            case 'organization':
                $userToEdit = OrganizationUser::find($route->parameter("organizationuser"));

                $editingUser = OrganizationUser::where('account_id' , $user->_id)
                                ->where('organization_id' ,$route->parameter('organization'))->first(['rol_id', 'properties']);

                $adminsavailable = OrganizationUser::where('organization_id', $route->parameter('organization'))
                                    ->where('rol_id' , $rolAdministrator)
                                    ->get();
                break;
        }

        $rol = ($editingUser !== null) ? Rol::find($editingUser->rol_id) : null;        
        
        
        if($userToEdit->_id === $editingUser->_id) 
        {   
            $dataRol = isset($data["rol_id"]) ? $data["rol_id"] : $data["properties"]["rol_id"];
            
                  
            if(isset($dataRol) && ($rolAdministrator === $editingUser->rol_id) && ($dataRol !== $rolAdministrator))
            {                   
                
                if(count($adminsavailable) >= 2 )
                {                       
                    return $next($request);                        
                }else{
                    throw abort(409 , "There must be at least one administrator in the event.");
                }

            }
            $request->merge(['rol_id' => $userToEdit->rol_id]);
          
            return $next($request);
        }else if(($rol) && $rol->type === 'admin'){
            $permissionsRolUser = RolesPermissions::whereHas('permission', function($query) use ($permissions)
            {
                $query->whereIn('name', $permissions);
            
            })->where('rol_id' , $editingUser->rol_id)->first();

            if($permissionsRolUser ==! null)
            {   
                
                return $next($request);
            }
        }

        throw abort(401 , "You don't have permission for do this action.");


    }

    

}