<?php

namespace App;

use Moloquent;

class User extends Moloquent
{
    protected static $unguarded = true;
    //protected $primaryKey = 'uid';
    protected $fillable = ['name', 'email', 'uid'];

    protected static $auth;

    public function __construct($attributes = array())
    {
        parent::__construct($attributes);

    }

    public static function boot()
    {

        parent::boot();

        self::$auth = resolve('Kreait\Firebase\Auth');

        //Creamos el usuario en firebase
        self::creating(
            function ($model) {
                
                try{
                    $fbuser = self::$auth->createUser(
                        [
                            "email" => $model->email,
                            //emailVerified: false,
                            //phoneNumber: "+11234567890",
                            "password" => isset($model->password) ? $model->password : "mocion.2040",
                            "displayName" => isset($model->name) ? $model->name : $model->email,
                            //photoURL: "http://www.example.com/12345678/photo.png",
                            //disabled: false
                        ]
                    );
                    $model->uid = $fbuser->uid;
                    //var_dump($fbuser);
                }catch(\Exception $e){
                    var_dump($e);
                }
            }
        );
    }

    /**
     * The messages that belong to the user.
     */
    public function messages()
    {
        return $this->belongsToMany('App\Message', null, 'user_id', 'message_id');
    }

    public function events()
    {
        return $this->morphMany('App\Event', 'organizer');
    }

    public function ownedEvents()
    {
        return $this->hasMany('App\Event');
    }

    public function organizations()
    {
        return $this->belongsToMany('App\Organization');
    }
    //->as('subscription')
    //->withTimestamps();

}
