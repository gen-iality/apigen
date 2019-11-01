<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */ 
class Invitation extends Moloquent
{

    //protected $with = ['event'];

    //protected $table = 'Invitation';
    /**
     * Category is owned by an event
     * @return void
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    protected $fillable = [
        'name' , 'content' , 'image' , 'event_id' , 
    ];
}
