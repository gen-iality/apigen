<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Notification extends MyBaseModel
{
    protected $table = "notifications";
    protected static $unguarded = true;
    protected $dates = ['created_at', 'updated_at'];
}
