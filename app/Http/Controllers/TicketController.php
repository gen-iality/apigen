<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event_id)
    {
        $results = Ticket::where("event_id", $event_id)->get();
        //$results = Ticket::where("event_id", $event_id)->paginate(config('app.page_size'));
        return JsonResource::collection($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
	$request->validate([
	    'name' => 'required|string'
	]);

        $data = $request->json()->all();
        $data["event_id"] = $event_id;
        $ticket = Ticket::create($data);

        return $ticket;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $event_id, $id)
    {
        $model = Ticket::findOrFail($id);
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();
        $model = Ticket::findOrFail($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {
        $model = Ticket::findOrFail($id);
        return (string) $model->delete();
    }

    public function assingTicketToUser(Request $request, Account $user, Ticket $ticket)
    {
	$ticket->owner_user = $user->_id;
	$ticket->save();

	return $ticket;
    }
}
