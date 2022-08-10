<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\Bingo;
use App\Event;
use App\Http\Resources\BingoResource;

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

    /**
     * BingobyEvent_: search of Bingo by event.
     *
     * @urlParam event required  event_id
     *
     */

    public function BingobyEvent(string $event_id)
    {
      $bingo =  Bingo::where('event_id', $event_id)->first();
      return $bingo;
    }

    public function update(Request $request, $event, Bingo $bingo)
    {
      $data = $request->json()->all();
      $bingo->fill($data);
      $bingo->save();

      return response()->json($bingo);
    }

    public function destroy($event, Bingo $bingo)
    {
      $bingo->delete();

      return response()->json([], 204);
    }

    public function createRandomBingoValues($event, Bingo $bingo)
    {
      $bingoValues = $bingo->bingo_values;
      $randomBingoValues = [];

      // generar valores aleatoreos para bingo ganador
      while(count($randomBingoValues) < count($bingoValues)) {
	$randomValue = $bingoValues[rand(0, count($bingoValues) - 1)];
	!in_array($randomValue, $randomBingoValues, true)
	  && array_push($randomBingoValues, $randomValue);
      }
      $bingo->random_bingo_values = $randomBingoValues;
      $bingo->save();

      return response()->json($bingo);
    }

    public function importBingoValues(Request $request, $event, Bingo $bingo)
    {
      $request->validate([
	'type' => 'required|string|in:string,image',
	'carton_value' => 'required|string',
	'ballot_value' => 'required|string'
      ]);

      $value = $request->json()->all();
      $bingoValues = $bingo->bingo_values ?
	$bingo->bingo_values : [];

      // no pueden haber valores repetidos
      if(in_array($value, $bingoValues, true)) {
	return response()->json(['message' => "Value ${value['carton_value']} already exists in bingo values "], 403);
      }

      array_push($bingoValues, $value);
      $bingo->bingo_values = $bingoValues;
      $bingo->save();

      return response()->json($bingo);
    }
}
