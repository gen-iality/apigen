<?php

namespace App\Http\Controllers;

use App\Boleteria;
use App\Event;
use Illuminate\Http\Request;

class BoleteriaController extends Controller
{
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
	// traer evento y validar su tipo de acceso
	if($event->allow_register == true && $event->visibility == 'PUBLIC') {
	    // crear boleteria y asociarla el evento
	    $data = $request->json()->all();
	    $data = array_merge($data, ['event_id' => $event->_id]);
	    $boleteria = Boleteria::create($data);
	    $event->boleteria_id = $boleteria->_id;
	    $event->save();

	    return response()->json(compact('boleteria'), 201);
	}

	return response()->json(['message' => "Type of event acceso must be 'Mandatory registration with authentication'"], 403) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boleteria  $boleteria
     * @return \Illuminate\Http\Response
     */
    public function show(Boleteria $boleteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boleteria  $boleteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, Boleteria $boleteria)
    {
	$data = $request->json()->all();
	$boleteria->fill($data);
	$boleteria->save();

	return response()->json(compact('boleteria'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boleteria  $boleteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boleteria $boleteria)
    {
        //
    }
}
