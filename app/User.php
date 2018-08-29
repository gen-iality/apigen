<?php

namespace App;

use Moloquent;

class User extends Moloquent
{
    static protected  $unguarded = true;
    //protected $primaryKey = 'uid';
    protected $fillable = ['name', 'email', 'uid'];

    /**
     * The messages that belong to the user.
     */
    public function messages()
    {
        return $this->belongsToMany('App\Message', null, 'user_id', 'message_id');
    }
    //->as('subscription')
    //->withTimestamps();

}
