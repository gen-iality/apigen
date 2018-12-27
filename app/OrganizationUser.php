<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class OrganizationUser extends Moloquent
{
    protected $fillable = [ 'account_id', 'organization_id'];
    protected $with = ['user', 'organization'];
    
    public function user()
    {
        return $this->belongsTo('App\Account', 'account_id');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization','organization_id');
    }
/*     public function rol()
    {
        return $this->belongsTo('App\Rol','rol_id');
    } */
}
