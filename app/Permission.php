<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
class Permission extends Moloquent
{
    //
    protected $fillable = [ 'event_id', 'user_id', 'rol_id'];
}
