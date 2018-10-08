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
    public $eventUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $eventUser)
    {
        $event = Event::find($eventUser->event_id);
    
        $this->event     = $event;
        $this->eventuser = $eventUser;
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
