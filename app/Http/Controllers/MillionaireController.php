<?php

namespace App\Http\Controllers;

// models
use App\Event;
use App\Millionaire;
use Illuminate\Http\Request;

class MillionaireController extends Controller
{
    /**
     * It creates a new Millionaire object and saves it to the database
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
            'number_of_questions' => 'required|numeric',
        ]);

        $data = $request->json()->all();
        $data['event_id'] = $event->_id;
        $millionaire = Millionaire::create($data);

        //Nuevo atributo para el bingo creado. $event->dynamics.
        if (isset($event->dynamics)) {
            $dynamics = $event->dynamics;
            $dynamics["millionaire"] = true;
        } else {
            $dynamics["millionaire"] = true;
        }
        $event->dynamics = $dynamics;
        $event->save();

        return response()->json($millionaire, 201);
    }

    /**
     * BingobyEvent_: search of Millionaire by event.
     *
     * @urlParam event required  event_id
     *
     */

    public function MillionairebyEvent(string $event_id)
    {
        $millionaire = Millionaire::where('event_id', $event_id)->first();
        return $millionaire;
    }

    /**
     * It takes a request, an event, and a bingo, and updates the bingo with the data from the request
     *
     * @param Request request The request object.
     * @param event The event ID
     * @param Millionaire bingo The Millionaire model instance
     *
     * @return The updated bingo object.
     */
    public function update(Request $request, $event, Millionaire $millionaire)
    {
        $data = $request->json()->all();
        $millionaire->fill($data);
        $millionaire->save();

        return response()->json($millionaire);
    }

    /**
     * It deletes a bingo and all its cards
     *
     * @param Event event The event that the bingo belongs to.
     * @param Millionaire bingo The Millionaire object that will be deleted.
     *
     * @return 204 No Content
     */
    public function destroy(Event $event, Millionaire $millionaire)
    {
        if (isset($event->dynamics)) {
            $dynamics = $event->dynamics;
            $dynamics["millionaire"] = false;
        } else {
            $dynamics["millionaire"] = false;
        }
        $event->dynamics = $dynamics;
        $millionaire->delete();
        $event->save();
        return response()->json([], 204);
    }
}
