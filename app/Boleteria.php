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
	'iva_in', //Especifica en donde va el IVA, includo en el precio o añadido
	'iva_porcentage'
    ];

    protected $table = 'boleterias';
    //protected static $unguarded = true;
}
