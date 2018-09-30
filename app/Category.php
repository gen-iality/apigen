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

    protected $with = ['event'];

    /**
     * Category is owned by an event
     * @return void
     */
    public function event()
    {
        return $this->HasMany('App\Event');
    }

    protected $fillable = [
        'name',
    ];

}
