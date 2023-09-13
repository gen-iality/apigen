<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class GroupOrganization extends MyBaseModel
{
    protected $fillable = [
        'name',
        'organization_id',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
