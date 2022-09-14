<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Url extends MyBaseModel
{

    protected $table = ('urls');

    protected $fillable = [
        'long_url',
        'short_url',
        'url_code'
    ];

}