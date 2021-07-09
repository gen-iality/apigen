<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;
class Gallery extends Moloquent
{
    //
    protected $fillable = [
        'name',  
        'description', 
        'image', 
        'event_id',
        'price'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
