<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Undocumented class
 */
class Event extends Moloquent
{
    protected $with = ['userProperties'];
    //protected $collection = 'events';
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    protected $fillable = [
        'name', 'description','location', 'venue', 'pulep', 
        'datetime_start','datetime_end',
        'date_start', 'date_end', 'time_start','time_end',
        'visibility', 'picture', 'organization_id'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function eventUsers()
    {
        return $this->hasMany('App\EventUser');
    }

    /**
     * Dynamic user properties  
     *
     * @return void
     */
    public function userProperties()
    {
        return $this->hasMany('App\Properties');
    }

}
