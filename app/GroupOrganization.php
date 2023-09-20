<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class GroupOrganization extends MyBaseModel
{
    protected $fillable = [
        'name',
        'organization_id',
        'free_access_organization', // Boolean: acceso libre de eventos
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
