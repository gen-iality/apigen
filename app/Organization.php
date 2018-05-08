<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Organization extends Moloquent
{
    //
    protected $fillable = [ 'name', 'country', 'city', 'address', 'nit', 'phone', 'documents', 'description', 'owner'];
}
