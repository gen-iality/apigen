<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Event Model
 *
 */
class Event extends Moloquent
{
    const VISIBILITY_PUBLIC = 'PUBLIC';
    const VISIBILITY_ORGANIZATION = "ORGANIZATION";

    protected $with = ['userProperties', 'author','categories', 'eventType'];

    /**
     * Event is owned by an organization
     * @return void
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    protected $fillable = [
        'author', 'name', 'description', 'location', 'venue', 'pulep',
        'datetime_from', 'datetime_to',
        'date_start', 'date_end', 'time_start', 'time_end',
        'visibility', 'picture', 'organization_id', 'category'
    ];

    protected $dates = ['datetime_from', 'datetime_to', 'created_at', 'updated_at'];

    protected $casts = [
        'category' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');

    }

    public function eventUsers()
    {
        return $this->hasMany('App\EventUser');
    }

    public function categories()
    {
<<<<<<< HEAD
        return $this->hasMany('App\Category');
=======
        return $this->belongsToMany('App\Category');
>>>>>>> 38845eb2cbac1df304e16165200bd5b98d33990f
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

    /**
     * Get the comments for the blog post.
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    /**
     * Get the event type.
     */
    public function eventType()
    {
        return $this->belongsTo('App\EventType','event_type_id');
    }
}
