<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class EventUser extends Moloquent
{

    const STATE_DRAFT = "5b0efc411d18160bce9bc706";//"DRAFT";
    const STATE_INVITED = "5ba8d213aac5b12a5a8ce749";//"INVITED";
    const STATE_RESERVED = "5ba8d200aac5b12a5a8ce748";//"RESERVED";
    const STATE_BOOKED = "5b859ed02039276ce2b996f0";//"BOOKED";

    const ROL_ATTENDEE = "5afaf644500a7104f77189cd";

    protected static $unguarded = true;
    protected $fillable = ['userid', 'event_id', 'rol_id',  'state_id', "checked_in", "checked_in_date"];
    protected $with = ['user', 'rol', 'state'];

    //Default values
    protected $attributes = [
        'state_id'  => self::STATE_DRAFT,
        'rol_id'   => self::ROL_ATTENDEE,
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'userid');
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
}
