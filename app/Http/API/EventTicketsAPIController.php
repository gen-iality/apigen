<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventTicketsAPIController extends Controller
{
    /**
     * @param Request $request
     * @param $event_id
     * @return mixed
     */
    public function index(Request $request, String $event_id)
    {

        $query = Ticket::where('event_id', $event_id);
        return JsonResource::collection($query->get());
    }

    public function show(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $response = new JsonResource($ticket);
        //if ($survey["event_id"] = $event_id) {
        return $response;
    }

}