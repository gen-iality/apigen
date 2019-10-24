<?php

namespace App;
use Moloquent;
use Illuminate\Database\Eloquent\Model;


class UserProperties extends Moloquent
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    protected $guarded = [];
}
