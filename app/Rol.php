<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Rol extends Moloquent
{
    //
    const ID_ROL_ADMINISTRATOR = '5c1a59b2f33bd40bb67f2322';
    const ID_ROL_MODERATOR = '60dca467b38c630f83537e62';

    protected $fillable = [ 
        'name', 
        'type'
    ];

    protected $table = ('roles');
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public static function boot()
    {

        parent::boot();
        self::saving(function ($model) {
                
            if(($model->_id === self::ID_ROL_ADMINISTRATOR) ||  ($model->_id === self::ID_ROL_MODERATOR))
            {
                abort(401 , "You don't have permission for do this action.");
            }

        });

        self::deleting(function ($model) {
                
            if(($model->_id === self::ID_ROL_ADMINISTRATOR) ||  ($model->_id === self::ID_ROL_MODERATOR))
            {
                abort(401 , "You don't have permission for do this action.");
            }

        });
    }
    
}
