<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\Bingo;
use App\Event;

class BingoController extends Controller
{
    public function store(Request $request, Event $event)
    {
      $request->validate([
	'name' => 'required|string|max:250',
      ]);

      $data = $request->json()->all();
      $data[ 'event_id' ] = $event->_id;
      $bingo = Bingo::create($data);

      // estado para determinar si el evento cuenta con bingo creado
      $event->bingo = true;
      $event->save();

      return response()->json($bingo, 201);
    }

    public function show($event, Bingo $bingo)
    {
      return response()->json($bingo);
    }

    public function update(Request $request, $event, Bingo $bingo)
    {
      $data = $request->json()->all();
      $bingo->fill($data);
      $bingo->save();

      return response()->json($bingo);
    }

    public function createRamdonBingoValues($event, Bingo $bingo)
    {
      $bingoValues = $bingo->bingo_values;
      $ramdonBingoValues = [];

      // generar valores aleatoreos para bingo ganador
      // el valor de 25 se planea tener dinamico
      while(count($ramdonBingoValues) < 10) {
	$ramdonValue = $bingoValues[rand(0, count($bingoValues) - 1)];
	!in_array($ramdonValue, $ramdonBingoValues, true)
	  && array_push($ramdonBingoValues, $ramdonValue);
      }
      $bingo->ramdon_bingo_values = $ramdonBingoValues;
      $bingo->save();

      return response()->json($bingo);
    }

    public function importBingoValues(Request $request, $event, Bingo $bingo)
    {
      //
    }
}
