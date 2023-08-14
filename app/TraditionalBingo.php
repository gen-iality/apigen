<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class TraditionalBingo extends MyBaseModel
{
    protected $fillable = [
        'name',
        'event_id',
        'bingo_appearance',
        'regulation',
        'bingo_values',
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
