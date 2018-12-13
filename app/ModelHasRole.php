<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class ModelHasRole extends Moloquent
{
    //
    protected $table = ('model_has_roles');
    protected $fillable = ['role_id','event_id','model_id'];
}
