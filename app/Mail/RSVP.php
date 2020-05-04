<?php

namespace App\Mail;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RSVP extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $eventUser_name;
    public $eventuser_id;
    public $eventuser_lan;
    public $password;
    public $email;
    public $event;
    public $eventUser;
    public $image;
    public $link;
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

    public function __construct(string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
    {

        $auth = resolve('Kreait\Firebase\Auth');
        $this->auth = $auth;
        $event_location = null;
        if (!empty($event["location"]["FormattedAddress"])) {
            $event_location = $event["location"]["FormattedAddress"];
        }
        $email = isset($eventUser["properties"]["email"]) ? $eventUser["properties"]["email"] : $eventUser["email"];
        $password = isset($eventUser["properties"]["password"]) ? $eventUser["properties"]["password"] : "mocion.2040";
        $eventUser_name = isset($eventUser["properties"]["names"]) ? $eventUser["properties"]["names"] : $eventUser["properties"]["displayName"];

        // Admin SDK API to generate the sign in with email link.
        $link = "https://api.evius.co" . "/singinwithemail?email=" . $email;

        $this->link = $link;
        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventUser = $eventUser;
        $this->image = ($image) ? $image : null;
        $this->message = $message;
        $this->footer = $footer;

        $this->eventUser_name = $eventUser_name;
        $this->password = $password;
        $this->email = $email;

        $this->subject = "Invitación a " . $event->name . "";
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
        $from = $this->event->organizer->name;

        return $this
            ->from("alerts@evius.co", $from)
            ->subject($this->subject)
            ->markdown('rsvp.rsvpinvitation');
        //return $this->view('vendor.mail.html.message');
    }
}