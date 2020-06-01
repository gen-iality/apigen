<?php

namespace App\Http\Controllers\API;

use App\Attendee;
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

    public function ajustarticketid(Request $request)
    {
        $event_id = "5ec3f3b6098c766b5c258df2";
        $nuevo = "5ed5532369165504c81f13ae";
        $query = Attendee::where('event_id', $event_id)->paginate(1000);

        foreach ($query as $att) {

            if ($att->event_id == $event_id) {
                echo "<p>{$att->_id} </p>";
            }

            $att->event_id = $nuevo;
            $att->save();

        }

        return "true";
    }

    public function show(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $response = new JsonResource($ticket);
        //if ($survey["event_id"] = $event_id) {
        return $response;
    }

}