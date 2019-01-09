<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class OrganizationUser extends Moloquent
{
    protected $fillable = [
        'userid', 'organization_id', 'user_properties', 'properties',
    ];
    protected $with = ['user', 'organization'];

    public function user()
    {
        return $this->belongsTo('App\Account', 'userid');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }
/*     public function rol()
{
return $this->belongsTo('App\Rol','rol_id');
} */
}
