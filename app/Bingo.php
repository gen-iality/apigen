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
    'random_bingo_values',
    'dimensions' // cantidad celda bingo:  int 3, 4, 5
  ];

  public function event()
  {
    return $this->belongsTo('App\Event');
  }
}
