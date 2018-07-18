<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
class EventUser extends Moloquent
{
    //
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


    public function confirm(){
        $this->state_id = "5b188b41c4004d12ec13d139";
        return $this;
    }

    public function changeToInvite(){
        if ($this->state_id == "5b0efc411d18160bce9bc706" || !$this->state_id )
        {
            $this->state_id = "5b4ebb4c7c9ccd45328a31d6";
            $this->save();
        
        }
        //else
        //$this->state_id = $this->state_id;
        return $this;
    }

    protected $fillable = [ 'userid', 'event_id', 'rol_id', 'state_id'];
}
