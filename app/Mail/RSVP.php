<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Event;
use App\EventUser;
use App\User;

class RSVP extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $event;
    public $eventUser;
    public $image;
    public $message;
    public $footer;
    public $subject;
    public $urlconfirmacion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct(
        string $message, Event $event, $eventUser, string $image = null,$footer=null,string $subject = null)
    {
        $this->event     = $event;
        $this->eventUser = $eventUser;
        $this->image     = ($image)?$image:null;
        $this->message   = $message;
        $this->footer    = $footer;
        $this->subject   = ($subject)?$subject:"[Invitación] ";
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
        ->markdown('rsvp.rsvpinvitation');
        //return $this->view('vendor.mail.html.message');
    }
}
