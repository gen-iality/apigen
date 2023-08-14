<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Models
use App\Event;
use App\TraditionalBingo;

class TraditionalBingoController extends Controller
{

    /**
     * TraditionalBingobyEvent_: search of Traditional Bingo by event.
     *
     * @urlParam event required  event_id
     *
     */
    public function traditionalBingobyEvent(string $event_id)
    {
      $traditionalBingo =  TraditionalBingo::where('event_id', $event_id)->first();
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
	    'name' => 'required|string|max:255',
	]);

	$data = $request->json()->all();
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

	return response()->json(compact('traditionalBingo'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event, TraditionalBingo $traditionalBingo)
    {
	$traditionalBingo->delete();

	return response()->json([], 204);
    }
}
