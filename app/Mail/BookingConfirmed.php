<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Event;
use App\EventUser;
use QRCode;

class BookingConfirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $event;
    public $event_location;
    public $eventuser_name;
    public $eventuser_id;
    public $qr;
    public $logo;

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
        $eventUser_id = $eventUser->id;

        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventuser_name = $eventUser_name;
        $this->eventuser_id = $eventUser_id;
        $this->subject   = "[Tu Ticket - ".$event->name."]" ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $logo_evius = 'images/logo.png';
        var_dump($logo_evius);
        $file = 'qr/'.$this->eventuser_id.'_qr.png';
        $image = QRCode::text($this->eventuser_id)
                ->setSize(8)
                ->setMargin(4)
                ->setOutfile($file)
                ->png();
        $this->qr = url($file);
        $this->logo = url($logo_evius);

        return $this
        ->subject($this->subject)
        ->markdown('bookingConfirmed');        
    }
}
