<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
use App\Models\Organiser;

class Organization extends Organiser
{
    const ID_ROL_ADMINISTRATOR = '5c1a59b2f33bd40bb67f2322';
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
        'styles',
        'itemsMenu',
        'type_event'
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

    public function user_properties()
    {
        return $this->embedsMany('App\UserProperties');
    }

    public function template_properties()
    {
        return $this->embedsMany('App\TemplateProperties');
    }

    public function rols()
    {
        return $this->morphMany('App\Rol' , 'modeltable');
    }
}
