<?php

namespace App\Observers;

use App\Attendee;
use Illuminate\Support\Facades\Log;

class EventUserObserver
{
    /**
     * Handle the event user "created" event.
     *
     * @param  \App\Attendee  $eventUser
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
     * @param  \App\Attendee  $eventUser
     * @return void
     */
    public function updated( $eventUser)
    {
        Log::debug("model updated");
    }

    /**
     * Handle the event user "deleted" event.
     *
     * @param  \App\Attendee  $eventUser
     * @return void
     */
    public function deleted(Attendee $eventUser)
    {
        //
    }

    /**
     * Handle the event user "restored" event.
     *
     * @param  \App\Attendee  $eventUser
     * @return void
     */
    public function restored(Attendee $eventUser)
    {
        //
    }

    /**
     * Handle the event user "force deleted" event.
     *
     * @param  \App\Attendee  $eventUser
     * @return void
     */
    public function forceDeleted(Attendee $eventUser)
    {
        //
    }
}
