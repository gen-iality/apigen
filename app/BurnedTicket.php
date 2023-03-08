<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class BurnedTicket extends MyBaseModel
{
    protected $table = "burned_tickets";
    protected $fillable = [
	'code', // String: Identificador de 6 caracteres
	'billing_id', // String: Identificador de factura relacionada
	'ticket_category_id', // String: Identificador de categoria
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $with = ["user","ticketCategory"];

    public function user()
    {
        return $this->belongsTo('App\Account');
    }

    public function ticketCategory()
    {
        return $this->belongsTo('App\TicketCategory');
    }
}
