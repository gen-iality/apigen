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

        $picture = array("name" => "picture", "label" => "Avatar", "unique" => false, "mandatory" => false, "type" => "avatar");
        $user_properties = new UserProperties($picture);
        $model->user_properties()->save($user_properties);        

    }
}