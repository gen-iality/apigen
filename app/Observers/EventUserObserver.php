<?php

namespace App\Observers;

use App\EventUser;
use Illuminate\Support\Facades\Log;

class EventUserObserver
{
    /**
     * Handle the event user "created" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function created( $eventUser)
    {
        Log::debug("model created");
    }

    public function saving($eventUser)
    {
        Log::debug("model saving");
    }
    /**
     * Handle the event user "updated" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function updated( $eventUser)
    {
        Log::debug("model updated");
    }

    /**
     * Handle the event user "deleted" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function deleted(EventUser $eventUser)
    {
        //
    }

    /**
     * Handle the event user "restored" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function restored(EventUser $eventUser)
    {
        //
    }

    /**
     * Handle the event user "force deleted" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function forceDeleted(EventUser $eventUser)
    {
        //
    }
}
