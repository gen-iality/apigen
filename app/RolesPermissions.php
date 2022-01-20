<?php

namespace App;

use Moloquent;
use Spatie\Permission\Traits\HasRoles;
use App\Rol;

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


    public static function boot()
    {

        parent::boot();
        self::saving(function ($model) {
                
            if(($model->r_id === Rol::ID_ROL_ADMINISTRATOR) ||  ($model->_id === Rol::ID_ROL_ATTENDEE))
            {
                abort(401 , "You don't have permission for do this action.");
            }

        });

        self::deleting(function ($model) {
                
            if(($model->_id === Rol::ID_ROL_ADMINISTRATOR) ||  ($model->_id === Rol::ID_ROL_ATTENDEE))
            {
                abort(401 , "You don't have permission for do this action.");
            }

        });
    }
}
