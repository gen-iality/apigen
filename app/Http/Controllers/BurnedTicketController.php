<?php

namespace App\Http\Controllers;

use App\BurnedTicket;
use App\Event;
use Illuminate\Http\Request;

class BurnedTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        return BurnedTicket::where("event_id", $event->_id)->latest()->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BurnedTicket  $burnedTicket
     * @return \Illuminate\Http\Response
     */
    public function show(BurnedTicket $burnedTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BurnedTicket  $burnedTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BurnedTicket $burnedTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BurnedTicket  $burnedTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(BurnedTicket $burnedTicket)
    {
        //
    }
}
