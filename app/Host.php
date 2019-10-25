<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */ 
class Host extends Moloquent
{

    //protected $with = ['staff'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    protected $fillable = [
        'name' , 'date', "time_inital" , "time_final" , "space" , "categories" , 
        "hosts" , "type" , "description" , "image" , "day_number" , "event_id"
    ];
}
