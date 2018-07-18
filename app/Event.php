<?php

namespace App;
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

class Event extends Moloquent
{
    //protected $collection = 'events';
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    protected $fillable = [ 'name', 'location', 'venue', 'pulep', 'description', 'hour', 'date_start', 'date_end', 'visibility', 'picture', 'organization_id'];

        /**
     * Get the comments for the blog post.
     */
    public function eventUsers()
    {
        return $this->hasMany('App\EventUser');
    }
}
