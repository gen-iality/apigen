<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Bingo extends MyBaseModel
{
  protected $fillable = [
    'name',
    'event_id',
    'bingo_appearance',
    'amount_of_bingo',
    'regulation',
    'bingo_values',
    'ramdon_bingo_values'
  ];

  public function event()
  {
    return $this->belongsTo('App\Event');
  }
}
