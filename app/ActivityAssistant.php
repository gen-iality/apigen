<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */ 
class ActivityAssistant extends Moloquent
{
    protected $dates = ['checkedin_at'];
    public function eventusers()
    {
        return $this->hasMany('App\Attendee');
    }
    public function Acitivities()
    {
        return $this->hasMany('App\Activities');
    }
    protected $guarded = [];
}
