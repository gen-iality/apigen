<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Url extends MyBaseModel
{

    protected $table = ('share_photos');
    protected $dates = ['created_at', 'updated_at'];


    protected $fillable = [
        'title',
        'event_id',
        'tematic',
        'published',
        'active',
        'points_per_like',
        'posts'
    ];

}