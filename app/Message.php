<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Message extends Moloquent
{
    protected $table = ('messages');

    public function message()
    {
        return $this->hasMany('App\MessageUser');
    }

}
