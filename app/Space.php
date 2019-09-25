<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */ 
class Space extends Moloquent
{

    //protected $with = ['event'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    protected $fillable = [
        'space' , 'event_id' 
    ];
}
