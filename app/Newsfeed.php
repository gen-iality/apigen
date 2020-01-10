<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Category Model
 *
 */ 
class Newsfeed extends Moloquent
{

    //protected $with = ['staff'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    protected $fillable = [
        'title' , 'desc' , 'article'  
    ];
}
