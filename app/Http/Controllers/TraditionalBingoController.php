<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Models
use App\Event;
use App\TraditionalBingo;
use App\BingoCard;

class TraditionalBingoController extends Controller
{
    // Valores bingo tradicional
    private const traditionalBingoValues = [
	    'B' => [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
	    'I' => [16,17,18,19,20,21,22,23,24,25,26,27,28,29,30],
	    'N' => [31,32,33,34,35,36,37,38,39,40,41,42,43,44,45],
	    'G' => [46,47,48,49,50,51,52,53,54,55,56,57,58,59,60],
	    'O' => [61,62,63,64,65,66,67,68,69,70,71,72,73,74,75],
    ];

    /**
     * TraditionalBingobyEvent_: search of Traditional Bingo by event.
     *
     * @urlParam event required  event_id
     *
     */
    public function traditionalBingobyEvent(string $event_id)
    {
      $traditionalBingo =  TraditionalBingo::where('event_id', $event_id)->first();
      if(!$traditionalBingo) {
	    return response()->json(['message' => 'Bingo not found'], 404);
      }

      return $traditionalBingo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
	$request->validate([
	    'name' => 'required|string|max:255'
	]);

	$data = $request->json()->all();

	// Datos default para bingo tradicional
	$data['bingo_values'] = self::traditionalBingoValues;
	$data['event_id'] = $event->_id;

	$traditionalBingo = TraditionalBingo::create($data);

	$event->bingo = true;
	$event->save();

	return response()->json(compact('traditionalBingo'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event, TraditionalBingo $traditionalBingo)
    {
	$request->validate([
	    'name' => 'string|max:255',
	    'regulation' => 'string'
	]);

	$data = $request->json()->all();
	$traditionalBingo->fill($data);
	$traditionalBingo->save();

	return response()->json(compact('traditionalBingo'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, TraditionalBingo $traditionalBingo)
    {
	// Eliminar todos los cartones de ese bingo
	BingoCard::where('event_id', $event->_id)
      	  ->where('tradicional_bingo_id', $traditionalBingo->_id)
      	  ->delete();

	$traditionalBingo->delete();

        //Cambiar estado del bingo en el evento
        $event->bingo = null;
        $event->save();

	return response()->json([], 204);
    }
}
