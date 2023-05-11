<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Subasta extends MyBaseModel
{
    protected $fillable = [
        'name',
        'event_id',
        'pay_for_evius',
        'external_payment_url',
        'subasta_appearance',
        'currency',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
