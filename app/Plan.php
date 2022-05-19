<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Plan extends MyBaseModel
{
    protected $table = "planes";
    protected static $unguarded = true;
    protected $dates = ['created_at', 'updated_at'];
}
