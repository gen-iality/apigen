<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Event;
use App\EventUser;
use App\User;

class RSVP extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $eventUser;
    public $image;
    public $message;
    public $urlconfirmacion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $message, Event $event, $eventUser, string $image)
    {
        $this->event = $event;
        $this->eventUser = $eventUser;
        $this->image = $image;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('rsvp.rsvpinvitation');
        //return $this->view('vendor.mail.html.message');
    }
}
