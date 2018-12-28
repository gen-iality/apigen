<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
use App\Models\Organiser;

class Organization extends Organiser
{
    //
    protected $fillable = [ 'name', 'country', 'city', 'picture','location', 'nit', 'phone', 'doc', 'description', 'author','email','network'];

   /*  public function events()
    {
        // return $this->morphMany('App\Event', 'organizer');
        return $this->belongsTo('App\Event', 'organizer_id');
    } */
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }  
}
