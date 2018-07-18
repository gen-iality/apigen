<?php

namespace App;

use Moloquent;

class User extends Moloquent
{
    protected $primaryKey = 'uid';
    protected $fillable = ['name', 'email', 'uid'];
}
