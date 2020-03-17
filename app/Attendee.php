<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Attendee extends Models\Attendee
{

    const STATE_DRAFT = "5b0efc411d18160bce9bc706";//"DRAFT";
    const STATE_INVITED = "5ba8d213aac5b12a5a8ce749";//"INVITED";
    const STATE_RESERVED = "5ba8d200aac5b12a5a8ce748";//"RESERVED";
    const STATE_BOOKED = "5b859ed02039276ce2b996f0";//"BOOKED";
    
    protected $table = "event_users";
    protected $observables = ['saved', 'created','updated'];
    protected static $unguarded = true;
    protected $fillable = ['account_id', 'event_id', 'state_id', "checked_in", "checked_in_date", "properties", "activities"];
    protected $with = ['role_attendees', 'user', 'state' ];

    //Default values
    protected $attributes = [
        'state_id'  => self::STATE_DRAFT,
        'checked_in' => false
    ];
     public function activities()
    {
        return $this->belongsToMany('App\Activities');
    }
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function user()
    {
        return $this->belongsTo('App\Account', 'account_id');
    }

    public function rol()
    {
        return $this->belongsTo('App\RoleAttendee', 'rol_id');
    }

    public function confirm()
    {   
        $this->state_id = self::STATE_BOOKED;
        return $this;
    }

    public function book()
    {   
        $this->state_id = self::STATE_BOOKED;
        return $this;
    }

    public function draft()
    {   
        $this->state_id = self::STATE_DRAFT;
        return $this;
    }

    public function checkIn()
    {
        try {
            $this->checked_in = true;
            $this->checked_in_date = time();
            return ($this->save()) ? "true" : "false";
        } catch (\Exception $e) {
            // do task when error
            return $e->getMessage();
        }

        return true;
    }

    public function changeToInvite()
    {

        if ($this->state_id == self::STATE_DRAFT || !$this->state_id) {
            $this->state_id = self::STATE_INVITED;
            $this->save();
        }
        return $this;
    }
   
    /**
     *La siguiente funcion se comento porque no se pudo 
     *hacer que el request obtuviera el usuario logueado
     *y asi poder ejecutar sus consultas sql
     */

    // protected static function boot()
    // {
    //     parent::boot();

    //     $request = request();
    //     var_dump("usuario");
    //     var_dump($request->get("user"));

    //     if(isset($request->user)){ 
    //         static::addGlobalScope('visibility', function (Builder $builder) {
    //             $builder->where('visibility', 'IS NULL', null, 'and');
    //         });
    //     }else{
    //         static::addGlobalScope('visibility', function (Builder $builder) {
    //             $builder->where('visibility', '<>', Event::VISIBILITY_ORGANIZATION );
    //         });
    //     }
    // }
}
