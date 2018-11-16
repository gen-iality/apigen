<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Organization extends Moloquent
{
    //
    protected $fillable = [ 'name', 'country', 'city', 'picture','location', 'nit', 'phone', 'doc', 'description', 'author','email'];

    public function events()
    {
        return $this->morphMany('App\Event', 'organizer');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }  
}
