<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Moloquent;

class Product extends Moloquent
{
    protected $fillable = [
        'name',
        'description',
	'images',
        'event_id',
        'price',
        'by',
        'short_description',
	'position',
	'discount', // Number: Porcentaje de descuento del producto
	'type', // String: Dependiendo de donde se cree el producto |just-auction, just-store, auction-store

	// Producto de subasta
	//'subasta_id', // Cuando el producto pertenece a una subasta
	'start_price', // Number: Precio inicial del producto en la puja
	'end_price', // Number: Precio final del producto en la puja
	'state', // String: Estado del producto en la subasta |waiting, progress, auctioned
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
