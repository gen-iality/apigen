<?php


namespace App\evaLib\Services;
use App\Organization;
use App\Event;
use App\UserProperties;
use App\Attendee;
use App\Rol;
use App\RolesPermissions;



class OrganizationServices 
{
    public static function createDefaultUserProperties($organization_id)
    {
        /*Crear propierdades names, email, picture*/
        $model = Organization::find($organization_id);
        $name = array("name" => "email", "label" => "Correo", "unique" => false, "mandatory" => false, "type" => "email");
        $user_properties = new UserProperties($name);
        $model->user_properties()->save($user_properties);

        $email = array("name" => "names", "label" => "Nombres Y Apellidos", "unique" => false, "mandatory" => false, "type" => "text");
        $user_properties = new UserProperties($email);
        $model->user_properties()->save($user_properties);
     

    }

    public static function createDefaultStyles($styles, $organization)
    {

        $default_event_styles = config('app.default_event_styles');
        $stlyes_validation = $default_event_styles;
        if(isset($styles))
        {   

            $stlyes_validation = array_merge($default_event_styles, $styles);
        }
        $organization->styles = $stlyes_validation;
        $organization->save();
        return $stlyes_validation;
    }

    /**
     * This endpoint create an user in all events of the organization
     */
    public static function createMembers($user)
    {   
        $events = Event::where('organizer_id', $user->organization_id)->get();
        foreach ($events as $event)
        {
            $attendee = Attendee::updateOrCreate(
                [
                    "account_id" => $user->account_id,
                ],
                [
                    "properties" => $user->properties,                    
                    "rol_id" => $user->rol_id,
                    "event_id" => $event->_id
                ]
            );

            $rol = $user->rol_id; 
            if ($user->rol_id !== Rol::ID_ROL_ADMINISTRATOR &&  $user->_id !== Rol::ID_ROL_ATTENDEE)    
            {   

                $newRol = Rol::updateOrCreate(
                    [
                        "name" => $user->rol->name,
                        "event_id" => $event->_id,
                    ]
                );

                $newRol->save();

                $rolesPermissions = RolesPermissions::where('rol_id', $user->rol_id)->get();

                foreach ($rolesPermissions as $rolPermission)
                {
                    $newRolPermission = RolesPermissions::updateOrCreate(
                        [
                            "rol_id" => $newRol->_id,
                            "permission_id" => $rolPermission->permission_id,
                        ]
                    );
                    $newRolPermission->save();
                }

            }        
            
            $attendee->save();
        }
        
        return "Creating successful attendees";
    }
}