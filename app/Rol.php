<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Rol extends Moloquent
{
    //
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    protected $fillable = [ 'userid', 'event_id'];
}
