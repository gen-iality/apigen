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
	'iva_percentage',
	'states_sales', // String: Venta abierta || Cerrrada
	'min_tickets_per_user', // Number
	'max_tickets_per_user', // Number
	'valid_age', // Number
	'list_landing', // Boolean
	'range_prices_landing', // Boolean
	'ticket_capacity' // Number: Aforo de personas/tickets
    ];

    protected $table = 'boleterias';

    protected $dates = ['created_at', 'updated_at'];
    //protected static $unguarded = true;
}
