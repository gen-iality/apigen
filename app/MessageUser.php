<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Moloquent;
class MessageUser extends Moloquent
{

    protected $table = ('messages_users');
}
