<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class ModelHasRole extends Moloquent
{
    //
    protected $table = ('model_has_roles');
    protected $fillable = ['role_id','event_id','model_id'];
    protected $with = ['user', 'role']; 
    public function user()
    {
        return $this->belongsTo('App\User', 'model_id');
    }

    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role', 'role_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }
}
