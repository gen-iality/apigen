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
    /**
     * It creates a new Bingo object and saves it to the database
     * 
     * @param Request request The request object.
     * @param Event event The event that the bingo belongs to.
     * 
     * @return A JSON object with the bingo created.
     */
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

    /**
     * It takes a request, an event, and a bingo, and updates the bingo with the data from the request
     * 
     * @param Request request The request object.
     * @param event The event ID
     * @param Bingo bingo The Bingo model instance
     * 
     * @return The updated bingo object.
     */
    public function update(Request $request, $event, Bingo $bingo)
    {
      $data = $request->json()->all();
      $bingo->fill($data);
      $bingo->save();

      return response()->json($bingo);
    }

    /**
     * It deletes a bingo and all its cards
     * 
     * @param Event event The event that the bingo belongs to.
     * @param Bingo bingo The Bingo object that will be deleted.
     * 
     * @return 204 No Content
     */
    public function destroy(Event $event, Bingo $bingo)
    {
      $bingoCards = BingoCard::where('event_id', $event->_id)
        ->where('bingo_id', $bingo->_id)
        ->get();
      if (isset($bingoCards)) {
        foreach ($bingoCards as $bingoCard) {
          $bingoCard->delete();
        }
      }
      $bingo->delete();

      //Cambiar estado del bingo en el evento
      $event->bingo = null;
      $event->save();

      return response()->json([], 204);
    }

    /**
     * It generates a random array of values from the original array of values
     * 
     * @param event The event that triggered the listener.
     * @param Bingo bingo The Bingo model instance.
     * 
     * @return A JSON object with the Bingo object.
     */
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

    /**
     * It takes a JSON array of objects, each object containing a `carton_value` and a `ballot_value`
     * property, and saves them to the database
     * 
     * @param Request request The request object.
     * @param event The event ID
     * @param Bingo bingo The Bingo model instance.
     * 
     * @return The response is a json object with the following structure:
     * ```
     * {
     *   "success": [{}]
     *   "count_success": 2,
     *   "fail": [{}],
     *   "count_fail": 2
     */
    public function importBingoValues(Request $request, $event, Bingo $bingo)
    {
      $valuesToImport = $request->json()->all();
      /*
      $bingoValues = $bingo->bingo_values ?
	      $bingo->bingo_values : [];
      */
      //eliminar la data de momento y a futuro un flag para identificar si se añaden a la data existente
      if(true){ //flag
        $bingo->bingo_values = [];
        $bingo->save();
      }

      $bingoValues = $bingo->bingo_values;
      $bingoValues_fail = [];


      foreach($valuesToImport as $value) {
        $count_fail = count($bingoValues_fail);
        if(!isset($value['carton_value']) || !isset($value['ballot_value'])) {
          array_push($bingoValues_fail, $value);
        }
        if(!isset($value['carton_value']['type']) || !isset($value['ballot_value']['type'])) {
          array_push($bingoValues_fail, $value);
        }
        if(!isset($value['carton_value']['value']) || !isset($value['ballot_value']['value'])) {
          array_push($bingoValues_fail, $value);
        }
        // validar que el tipo de carton_value sea el correcto
        if($value['carton_value']['type'] != 'text' && $value['carton_value']['type'] != 'image') {
          array_push($bingoValues_fail, $value);
        }
        // validar que el tipo de ballot_value sea el correcto
        if($value['ballot_value']['type'] != 'text' && $value['ballot_value']['type'] != 'image') {
          array_push($bingoValues_fail, $value);
        }

        if($count_fail == count($bingoValues_fail)) {
          $value[ 'id' ] = uniqid('', true);
          array_push($bingoValues, $value);
        }
      }

      $bingo->bingo_values = $bingoValues;
      $bingo->save();

      return response()->json(
        [
          'success' => $bingoValues,
          'count_success' => count($bingoValues),
          'fail' => $bingoValues_fail,
          'count_fail' => count($bingoValues_fail)
        ], 201
      );
    }

    /**
     * It adds a value to the bingo values array
     * 
     * @param Request request The request object
     * @param event The event ID
     * @param Bingo bingo The Bingo model instance
     * 
     * @return The bingo object is being returned.
     */
    public function addBingoValue(Request $request, $event, Bingo $bingo)
    {
      $request->validate([
	'carton_value.type' => 'required|string|in:text,image',
	'carton_value.value' => 'required|string',
	'ballot_value.type' =>  'required|string|in:text,image',
	'ballot_value.value' =>  'required|string',
      ]);

      $value = $request->json()->all();
      $value['id'] = uniqid('', true);
      $bingoValues = $bingo->bingo_values ?
	    $bingo->bingo_values : [];

      //if(in_array($value, $bingoValues, true)) {
	      //return response()->json(['message' => "Value ${value['carton_value']} already exists in bingo values "], 403);
      //}

      array_push($bingoValues, $value);
      $bingo->bingo_values = $bingoValues;
      $bingo->save();

      return response()->json($bingo);
    }

    public function editBingoValues(Request $request, $event, Bingo $bingo, $value_id)
    {
      $request->validate([
	'carton_value.type' => 'string|in:text,image',
	'carton_value.value' => 'string',
	'ballot_value.type' =>  'string|in:text,image',
	'ballot_value.value' =>  'string',
      ]);

      $value = $request->json()->all();
      $value['id'] = $value_id;

      //if(in_array($value, $bingo->bingo_values, true)) {
	      //return response()->json(['message' => "Value ${value['carton_value']} already exists in bingo values "], 403);
      //}

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
