<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Message extends Moloquent
{
    protected $table = ('messages');

    /**
     * The messages that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', null, 'message_id', 'user_id');
    }

    public function messageUsers()
    {
        return $this->hasMany('App\MessageUser');
    }    

}
