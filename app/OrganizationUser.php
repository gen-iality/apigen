<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class OrganizationUser extends Moloquent
{
    //
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
    protected $fillable = [ 'userid', 'organization_id', 'rol_id'];
}
