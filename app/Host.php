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

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

    protected $fillable = [
        'name', 
        'profession', 
        'description', 
        'image', 
        'event_id', 
        'en_description', 
        'profession', 
        'description_activity', 
        'order',
        'category_id'
    ];
}