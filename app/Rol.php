<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Rol extends Moloquent
{
    //
    protected $table = ('roles');
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    protected $fillable = [ 'account_id', 'event_id', 'organization_id', 'name', 'level'];
}
