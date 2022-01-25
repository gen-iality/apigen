<?php
namespace App\Http\Middleware\Permissions;

use Closure;
use Auth;
use App\Attendee;
use App\RolEvent;
use App\RolesPermissionsEvent;

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

        $rolAdministrator = RolEvent::ID_ROL_ADMINISTRATOR;
        //Separar los permisos para el endpoint
        $permissions = is_array($permission)
        ? $permission
        : explode('|', $permission);   

        $route = $request->route();

        $data = $request->json()->all();

        //Validate EventUser

        //EventUser que se va a editar
        $userToEdit = '';

        //Rol del usuario que edita
        $editingUser = '';

        switch ($route->parameterNames()[0]) {
            case 'event':
                $userToEdit = Attendee::find($route->parameter("eventuser"));
                $editingUser = Attendee::where('account_id' , $user->_id)->where('event_id' ,$route->parameter('event'))->first(['rol_id', 'properties']);
                break;
        }

        $rol = ($editingUser !== null) ? RolEvent::find($editingUser->rol_id) : null;
        // $request->json(['rol_id']) = RolEvent::ID_ROL_ATTENDEE;
        
        
        
        if($userToEdit->_id === $editingUser->_id) 
        {   
            if($data['rol_id'])
            {                  
                if(($rolAdministrator === $editingUser->_id))
                {
                    $adminsEvent = Attendee::where('event_id', $route->parameter('event')->where('rol_id' , $rolAdministrator))->get();
                    if(count($adminsEvent) >= 2 )
                    {
                       return $next($request);                        
                    }else{
                        throw abort(409 , "There must be at least one administrator in the event.");
                    }

                }
                $request->merge(['rol_id' => $userToEdit->rol_id]);
                return $next($request);
            }
        }else if(($rol) && $rol->type === 'admin'){
            $permissionsRolUser = RolesPermissionsEvent::whereHas('permission', function($query) use ($permissions)
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