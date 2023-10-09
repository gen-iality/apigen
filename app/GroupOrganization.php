<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class GroupOrganization extends MyBaseModel
{
    protected $fillable = [
        'name',
        'organization_id',
        'event_ids', // Array de eventos
        'organization_user_ids', // Array de miembros de organizacion
        'free_access_organization', // Boolean: acceso libre de eventos
    ];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
