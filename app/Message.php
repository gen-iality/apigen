<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Message extends Moloquent
{
    protected $table = ('messages');
    protected $with  = ['messageUsers'];
    protected $fillable = ['subject','message','footer','image','number_of_recipients'];
    /**
     * The messages that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\Account', null, 'message_id', 'user_id');
    }

    public function messageUsers()
    {
        return $this->hasMany('App\MessageUser');
    }

    /**
     * Get the event that owns the message.
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

}
