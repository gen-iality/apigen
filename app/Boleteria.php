<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Boleteria extends MyBaseModel
{
    protected $fillable = [
	'title',
	'event_id',
	'datetime_from',
	'datetime_to',
	'event_id',
	'IVA',
	'IVA%'
    ];

    protected $table = 'boleterias';
    //protected static $unguarded = true;
}
