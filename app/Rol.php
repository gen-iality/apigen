<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Rol extends Moloquent
{
    //
    const ID_ROL_ADMINISTRATOR = '5c1a59b2f33bd40bb67f2322';
    const ID_ROL_MOREDATOR = '60dca467b38c630f83537e62';

    protected $fillable = [ 
        'account_id', 
        'event_id', 
        'organization_id', 
        'name', 
        'level'
    ];

    protected $table = ('roles');
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    
}
