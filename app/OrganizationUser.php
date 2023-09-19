<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class OrganizationUser extends Moloquent
{
    protected $fillable = [
        'organization_id', 
        'user_properties', 
        'properties', 
        'account_id', 
        'rol_id',
        'active' // Boolean
    ];
    protected $with = ['user', 'organization', 'rol'];

    public function user()
    {
        return $this->belongsTo('App\Account', 'account_id');
    }

    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol', 'rol_id');
    }
}
