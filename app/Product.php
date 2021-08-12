<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;
class Product extends Moloquent
{
    //
    protected $fillable = [
        'name',  
        'description', 
        'image', 
        'event_id',
        'price',
        'artist'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
