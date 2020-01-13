<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;
use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Category Model
 *
 */ 
class Activities extends Moloquent
{
    protected $with = ['activity_categories','space','hosts','type','access_restriction_roles'];
    protected $appends = ['access_restriction_types_available']; 
/*
 * magic property to return type of restrictions activities 
*/
    public function getAccessRestrictionTypesAvailableAttribute(){

        return config('app.activity_access_restriction_types');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function space()
    {
        return $this->belongsTo('App\Space');
    }

    public function activity_categories()
    {
        return $this->belongsToMany('App\ActivityCategories' );
    }

    public function hosts()
    {
        return $this->belongsToMany('App\Host');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function access_restriction_roles()
    {
        return $this->belongsToMany ('App\RoleAttendee');
    }

    public function users()
    {
        return $this->embedsMany('App\ActivityUsers');
    }
    protected $dateformat = 'Y-m-d H:i';
    protected $fillable = [
        'name' , 
        'subtitle',
        'datetime_start' , 
        "datetime_end" , 
        "space_id" ,
        "activity_categories_ids" , 
        "host_ids" , 
        "type_id" , 
        "description" ,
        "image" ,
        "user" , 
        "event_id",
        "acitivity_users",
        "capacity",
        "remaining_capacity",
        "access_restriction_type",
        "access_restriction_rol_ids",
        "has_date"
    ];
}