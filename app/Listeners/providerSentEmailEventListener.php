<?php

namespace App\Listeners;

use App\Events\providerSentEmail;
use Illuminate\Support\Facades\Log;

class providerSentEmailEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  providerSentEmail  $event
     * @return void
     */
    public function handle(providerSentEmail $event)
    {
        Log::debug('mensaje enviadox.');
        var_dump("mensaje enviadox", $event->res);
    }
}
