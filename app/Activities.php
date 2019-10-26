<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;
use Carbon\Carbon;

/**
 * Category Model
 *
 */ 
class Activities extends Moloquent
{
    protected $with = ['categories','space','hosts','type'];


    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function space()
    {
        return $this->belongsTo('App\Space');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category' );
    }

    public function hosts()
    {
        return $this->belongsToMany('App\Host');
    }
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    protected $dateformat = 'Y-m-d H:i';
    protected $fillable = [
        'name' , 
        'datetime_start' , 
        "datetime_end" , 
        "space_id" ,
        "category_ids" , 
        "host_ids" , 
        "type_id" , 
        "description" ,
        "image" 
    ];
}