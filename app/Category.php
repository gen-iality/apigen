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
    /**
     * Category is owned by an event
     * @return void
     */
    public function event()
    {
        return $this->belongsToMany('App\Event');
    }

    protected $fillable = [
        'name','event_ids','created_at'
    ];
}
