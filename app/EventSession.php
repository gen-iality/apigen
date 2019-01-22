<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class EventSession extends Moloquent
{
    protected $table = ('event_session');


    public function event() {
        
		return $this->belongsTo('App\Event');
	}
}
