<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Subasta;

class SubastaController extends Controller
{
    /**
    * SubastaByEvent: Event's Subasta.
    *
    * @urlParam event required  event_id
    */
    public function SubastaByEvent(string $event_id)
    {
        $subasta =  Subasta::where('event_id', $event_id)->first();

	if(empty($subasta)) {
	    return response()->json(['message' => 'Subasta not found'], 404);
	}

        return response()->json($subasta);
    }

    /**
     * _store_: It creates a new Subasta object and saves it to the database
     *
     * @urlParam event_id required The id of the event to add the subasta.
     *
     * @bodyParam name string required The name of the subasta.
     * @bodyParam currency string Example: USD, COP
     *
     * @return A JSON object with the subasta created.
     */
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'currency' => 'required|string|in:USD,COP',
        ]);

        $data = $request->json()->all();
        $data['event_id'] = $event->_id;

	$subasta = Subasta::create($data);

        return response()->json($subasta, 201);
    }
}
