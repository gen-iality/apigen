<?php

namespace App;

use Moloquent;

class Message extends Moloquent
{

    const STATUS_QUEUED = 'queued';
    const SENT = 'sent';
    const VIEWED = 'viewed';
    const FAILED = 'failed';

    protected $table = ('messages');
    protected $with = ['messageUsers'];
    protected $fillable = ['subject', 'server_message_id', 'total_delivered', 'total_sent', 'total_clicked', 'total_bounced', 'total_opened', 'total_complaint', 'message', 'footer', 'image', 'number_of_recipients'];
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