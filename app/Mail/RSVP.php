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
    public $event_location;
    public $logo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct(
        string $message, Event $event, $eventUser, string $image = null,$footer=null,string $subject = null)
    {

        $event_location = ($event["location"]["FormattedAddress"]);

        $this->event          = $event;
        $this->event_location = $event_location;
        $this->eventUser = $eventUser;
        $this->image     = ($image)?$image:null;
        $this->message   = $message;
        $this->footer    = $footer;
        
        $this->subject   = "[Invitación - ".$event->name."]";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $logo_evius = 'images/logo.png';
        $this->logo = url($logo_evius);
        $from = isset($this->event->organizer->name)?$this->event->organizer->name."(Evius)":"(Evius)"; 

        return $this
        ->from("apps@mocionsoft.com", $from)
        ->subject($this->subject)
        ->markdown('rsvp.rsvpinvitation');
        //return $this->view('vendor.mail.html.message');
    }
}
