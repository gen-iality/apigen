<?php

namespace App\Observers;

use App\EventUser;

class EventUserObserver
{
    /**
     * Handle the event user "created" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function created(EventUser $eventUser)
    {
        //
    }

    /**
     * Handle the event user "updated" event.
     *
     * @param  \App\EventUser  $eventUser
     * @return void
     */
    public function updated(EventUser $eventUser)
    {
        //
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
