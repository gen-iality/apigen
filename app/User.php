<?php

namespace App;

use Moloquent;

class User extends Moloquent
{
    protected static $unguarded = true;
    //protected $primaryKey = 'uid';
    protected $fillable = ['name', 'email', 'uid'];

    /**
     * The messages that belong to the user.
     */
    public function messages()
    {
        return $this->belongsToMany('App\Message', null, 'user_id', 'message_id');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }
    //->as('subscription')
    //->withTimestamps();

}
