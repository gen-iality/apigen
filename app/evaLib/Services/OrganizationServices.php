<?php


namespace App\evaLib\Services;
use App\Organization;
use App\UserProperties;



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
}