<?php

namespace App;

//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
//Importante usar moloquent!!!!!!
use Moloquent;

/**
 * Event Model
 *
 */
class Event extends Models\Event
{
    const VISIBILITY_PUBLIC = 'PUBLIC';
    const VISIBILITY_ORGANIZATION = "ORGANIZATION";
    const ID_ROL_ADMINISTRATOR = '5c1a59b2f33bd40bb67f2322';

    protected $with = ['author', 'categories', 'eventType', 'organizer','currency'];

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
        'visibility', 'picture', 'organization_id', 'category','extra_config', 'user_properties'
    ];

    protected $dates = ['datetime_from', 'datetime_to', 'created_at', 'updated_at'];

    protected $casts = [
        'category' => 'array',
    ];

    public function author()
    {
        return $this->belongsTo('App\Account', 'author_id');
    }

    /**
     * Override parent method
     * 
     */
    public function account()
    {
        return $this->belongsTo('App\Account', 'author_id');
    }

/**
 * get the possible organizers
 *
 * @return void
 */
    public function organizer()
    {
        return $this->morphTo();
    }

    public function eventUsers()
    {
        return $this->hasMany('App\Attendee');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Dynamic user properties
     *
     * @return void
     */
    // public function userProperties()
    // {
    //     return $this->hasMany('App\Properties');
    // }

    /**
     * Get the comments for the blog post.
     */
    public function messages()
    {
        return $this->hasMany('App\Message');
    }


    /**
     * The tickets associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    /**
     * Get the event type.
     */
    public function eventType()
    {
        return $this->belongsTo('App\EventType', 'event_type_id');
    }

     /**
     * The tickets associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('\App\Models\Ticket', 'event_id');
    }

    /**
     * The orders associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
