<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
class EventUser extends Moloquent
{
    //
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
    public function state()
    {
        return $this->belongsTo('App\State');
    }
    protected $fillable = [ 'userid', 'event_id', 'rol_id', 'state_id'];
}
