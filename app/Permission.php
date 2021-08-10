<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
class Permission extends Moloquent
{
    //
    protected $fillable = [
        'name', 
        'guard_name', 
        'module'        
    ];

    /**
     * The roles associated with the permission.    
     */
    public function roles()
    {
        return $this->hasMany(\App\Models\RolesPermissions::class);
    }
}
