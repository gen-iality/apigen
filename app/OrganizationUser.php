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
    protected $fillable = [ 'userid', 'organization_id'];
}
