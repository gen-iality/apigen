<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ApiBaseController;
use App\Event;
use App\Models\Ticket;
use App\Models\Currency;
use App\Models\TicketStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Log;


class EventTicketsAPIController extends Controller
{
    /**
     * @param Request $request
     * @param $event_id
     * @return mixed
     */
    public function index(Request $request,String $event_id)
    {
       
        $query = Ticket::where('event_id', $event_id);
        return JsonResource::collection($query->get());
    }
    
}
