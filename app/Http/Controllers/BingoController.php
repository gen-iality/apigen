<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\Bingo;
use App\BingoCard;
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
      $bingoCards = BingoCard::where('event_id', $event)
        ->where('bingo_id', $bingo->_id)
        ->get();
      if (isset($bingoCards)) {
        foreach ($bingoCards as $bingoCard) {
          $bingoCard->delete();
        }
      }
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
      //$request->validate([
	//'type' => 'required|string|in:string,image',
	//'carton_value' => 'required|string',
	//'ballot_value' => 'required|string'
      //]);

      $valuesToImport = $request->json()->all();

      $bingoValues = $bingo->bingo_values ?
	    $bingo->bingo_values : [];

      foreach($valuesToImport as $value) {
	      unset($bingo['id']);
	      //isset($value['id']) && unset($bingo['id']);
	      if(in_array($value, $bingoValues, true)) {
            	  return response()->json(['message' => "Value ${value['carton_value']} already exists in bingo values "], 403);
              }

	      $value[ 'id' ] = uniqid('', true);
	      array_push($bingoValues, $value);
      }

      $bingo->bingo_values = $bingoValues;
      $bingo->save();

      return response()->json($bingo);
    }

    public function addBingoValue(Request $request, $event, Bingo $bingo)
    {
      $request->validate([
	'type' => 'required|string|in:text,image',
	'carton_value' => 'required|string',
	'ballot_value' => 'required|string'
      ]);

      $value = $request->json()->all();
      $value[ 'id' ] = uniqid('', true);
      $bingoValues = $bingo->bingo_values ?
	$bingo->bingo_values : [];

      if(in_array($value, $bingoValues, true)) {
	return response()->json(['message' => "Value ${value['carton_value']} already exists in bingo values "], 403);
      }

      array_push($bingoValues, $value);
      $bingo->bingo_values = $bingoValues;
      $bingo->save();

      return response()->json($bingo);
    }

    public function editBingoValues(Request $request, $event, Bingo $bingo, $value_id)
    {
      $request->validate([
	'type' => 'string|in:text,image',
	'carton_value' => 'string',
	'ballot_value' => 'string'
      ]);

      $value = $request->json()->all();
      $value['id'] = $value_id;

      if(in_array($value, $bingo->bingo_values, true)) {
	return response()->json(['message' => "Value ${value['carton_value']} already exists in bingo values "], 403);
      }

      $bingoValues = [];
      foreach($bingo->bingo_values as $bingoValue) {
	if(isset($bingoValue['id']) && $bingoValue['id'] === $value_id) {
	  $bingoValue = $value;
	}

	array_push($bingoValues, $bingoValue);
      }

      $bingo->bingo_values = $bingoValues;
      $bingo->save();

      return response()->json($bingo);
    }

    public function deleteBingoValue($event, Bingo $bingo, $value_id)
    {
      $bingoValues = $bingo->bingo_values;

      //se omite usar array_filter por la forma en que devuelve los datos, foreach como alternativa
      $newBingoValues = [];
      foreach($bingoValues as $value) {
	$value['id'] !== $value_id && array_push($newBingoValues, $value);
      };

      $bingo->bingo_values = $newBingoValues;
      $bingo->save();

      return response()->json($bingo);
    }
}
