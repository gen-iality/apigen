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

    public function user()
    {
        return $this->belongsTo('App\User','userid');
    }



    public function confirm(){
        $this->state_id = "5b188b41c4004d12ec13d139";
        return $this;
    }

    public function checkIn(){
        try{
            $this->checked_in = true;
            $this->checked_in_date = time();
            return ($this->save())?"true":"false";
         }
         catch(\Exception $e){
            // do task when error
            return $e->getMessage();  
         }        

        return true;
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

    protected $fillable = [ 'userid', 'event_id', 'rol_id', 'state_id',"checked_in","checked_in_date"];
}
