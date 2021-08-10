<?php

namespace App;

use Moloquent;
use Spatie\Permission\Traits\HasRoles;

class RolesPermissions extends Moloquent
{
    use HasRoles;

    const NAME_ROL_ADMINISTRATOR = 'Administrator';
    const NAME_ROL_COLABORATOR = 'Colaborator';
    const NAME_ROL_ATTENDEE = 'Attendee';

    //
    protected $with = ['rol' , 'permission'];
    protected $table = "roles_has_permissions";
    protected $fillable = [
        'rol_id' , 
        'permission_id'
    ];   
    
    
    public function permission()
    {
        return $this->belongsTo('App\Permission', 'permission_id');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol', 'rol_id');
    }
}
