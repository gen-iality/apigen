<?php

namespace App\Http\Middleware\Permissions;

use App\Account;
use Closure;
use Auth;
use App\OrganizationUser;
//use App\ModelHasRole;
use App\RolesPermissions;
//use App\Permission;
use App\Attendee;
use App\Event;
use App\Rol;
//use Spatie\Permissionn\Exceptions\UnauthorizedException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class PermissionMiddleware
{

    /**
     * validateOrganizaerRol
     * Si un miembro de la orgazacion tiene rol admin
     * este puede editar el evento que pertenesca a la orgazacion
     */
    private function validateOrganizerRol(Account $user, Event $event)
    {
        // traer OrganizationUser
        $organizationUserRol = OrganizationUser::where('account_id', $user->_id)
            ->where('organization_id', $event->organizer_id)
            ->pluck('rol_id');

        // Verificar que sea admin
        $rol = Rol::find($organizationUserRol[0]);
        if ($rol->type !== 'admin') {
            return false;
        }

        return true;
    }

    /**
     * validateOrganizerStatus
     * Si un miembro de la orgazacion esta inacativo
     * no puede obtener la informacion del evento
     *
     */
    private function validateOrganizerStatus(Account $user, string $event_id)
    {
        // traer OrganizationUser
        $event = Event::findOrFail($event_id);
        $organizationUser = OrganizationUser::where('account_id', $user->_id)
            ->where('organization_id', $event->organizer_id)
            ->first();

        // Unicamente los usuario que existan en la organizacion
        // y tengan active false no podran acceder al event
        if (!$organizationUser) {
            return true;
        }

        // Verificar estado active
        if ($organizationUser->active === false) {
            return false;
        }

        return true;
    }

    public function handle($request, Closure $next, $permission)
    {
        //Usuario autenticado
        $user = Auth::user();

        //Se valida el rol del usuario
        $userRol = '';

        //Validar parámetros de url
        $urlParameter = $request->route();

        //Separar los permisos para el endpoint
        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        if ($permission === 'getEvent' && !$user) {
            // Si no existe sesion se deje obtener el evento
            return $next($request);
        } elseif ($permission === 'getEvent' && $user) {
            // Validar estado active
            $isActice = $this->validateOrganizerStatus(
                $user,
                $urlParameter->parameter('event')
            );

            if (!$isActice) {
                throw new HttpResponseException(
                    response()->json(
                        ['message' => "You aren't an active user in this organizacion"],
                        401
                    )
                );
            }

            return $next($request);
        }

        if ($user  === null) {
            throw new AuthenticationException("No token provided. Unauthenticated");
        }

        //Aquí se valida si se accede a una config de un evento o una irganización
        switch ($urlParameter->parameterNames()[0]) {
            case 'event':
                $event = Event::findOrFail($urlParameter->parameter('event'));

                // Validar si es admin OrganizationUser
                $isAdminOrganizer = $this->validateOrganizerRol($user, $event);
                if ($isAdminOrganizer) {
                    return $next($request);
                }

                $userRol = Attendee::where('account_id', $user->_id)
                    ->where('event_id', $event->_id)
                    ->first(['rol_id', 'properties']);
                break;
            case 'organization':
                $userRol = OrganizationUser::where('account_id', $user->_id)
                    ->where('organization_id', $urlParameter->parameter('organization'))
                    ->first(['rol_id', 'role_id']);
                break;
        }

        $rol = isset($userRol) ? Rol::find($userRol->rol_id) : null;

        if (($rol) && $rol->type === 'admin') {
            //Busca el permiso por el nombre desde rolespermissions
            $permissionsRolUser = RolesPermissions::whereHas('permission', function ($query) use ($permissions) {
                $query->whereIn('name', $permissions);
            })->where('rol_id', $userRol->rol_id)->first();

            if ($permissionsRolUser == !null) {
                return $next($request);
            }
        }

        throw abort(401, "You don't have permission for do this action.");
    }
}
