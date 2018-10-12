<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Event;
use App\EventUser;

class BookingConfirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $event;
    public $event_location;
    public $eventuser_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $eventUser)
    {
        $event = Event::find($eventUser->event_id);
        $event_location = ($event["location"]["FormattedAddress"]);
        $eventUser_name =($eventUser["properties"]["name"]);

        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventuser_name = $eventUser_name;
        $this->subject   = "[Invitación] ";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject($this->subject)
        ->markdown('bookingConfirmed');        
    }
}
