<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ModelHasRole extends Moloquent
{
    //
    use HasRoles;
    protected $table = ('model_has_roles');
    protected $guard_name = 'web';
    protected $fillable = ['role_id','event_id','model_id', 'model_type', 'space_id' , 'organization_id'];
    protected $with = ['role','space','user']; 
    protected $times = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Account', 'model_id');
    }

    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role', 'role_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }

    public function organization()
    {
        return $this->belongsTo('App\Event','organization_id');
    }

    public function space()
    {
        return $this->belongsTo('App\Space','space_id');
    }
}
