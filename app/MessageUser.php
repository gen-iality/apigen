<?php

namespace App;

use Moloquent;

class MessageUser extends Moloquent
{

    const STATUS_QUEUED = 'queued';
    //created_at updated_at
    protected $table = ('message_user');

    /**
     * Default values for attributes
     * @var  array an array with attribute as key and default as value
     */
    protected $attributes = [
        'status' => self::STATUS_QUEUED,
        'status_message' => '',
    ];
    protected $fillable
    = ['status', 'email', 'status_message', 'message_id', 'user_id', 'event_user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function message()
    {
        return $this->belongsTo('App\Message');
    }

}
