<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Speaker extends Moloquent
{
    protected $table = ('speaker');
    protected $fillable = ['id','name','category','photo','position','company','social_media','video','country','description','order'];

    public function events()
    {
        return $this->hasOne('App\Event');
    }

}

  