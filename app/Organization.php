<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
use App\Models\Organiser;

class Organization extends Organiser
{
    //
    protected $fillable = [ 
        'name', 
        'country', 
        'city', 
        'picture',
        'location', 
        'banner_image_email', 
        'footer_image_email',
        'nit', 
        'phone', 
        'doc', 
        'description', 
        'author',
        'email',
        'network',
        'user_properties',
        'properties',
        'styles'
    ];

    protected $hidden = ['account_ids'];

   /*  public function events()
    {
        // return $this->morphMany('App\Event', 'organizer');
        return $this->belongsTo('App\Event', 'organiser_id');
    } */
    
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }  

    public function users()
    {
        return $this->belongsToMany('App\Account');
    } 
}
