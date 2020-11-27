<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */
class Category extends Moloquent
{
    //protected $with = ['event'];
    //protected $table = 'category';
    protected $hidden = array('activities_ids');
    /**
     * Category is owned by an event
     * @return void
     */
    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    protected $fillable = [
        'name', 'image','event_ids','created_at'
    ];
}
