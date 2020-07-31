<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */
class RoleAttendee extends Moloquent
{
    //protected $with = ['event'];

    //protected $table = 'category';
    /**
     * Category is owned by an event
     * @return void
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function attendee()
    {
        return $this->hasMany('App\Attendee');

    }
    protected $fillable = [
        'name', 'event_id', 'rol_id',
    ];
}