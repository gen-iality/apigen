<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Event;
use App\Organization;


class SilentAuctionMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $event;
    public $user;
    public $dataAuction;
    public $gallery;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataAuction, $event, $user, $gallery)
    {   
        
        $this->dataAuction = $dataAuction;
        $this->event =  Event::find($event);
        $this->user = $user;
        $this->gallery = $gallery;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $from = !empty($this->event->organizer_id) ? Organization::find($this->event->organizer_id)->name : "Evius Event ";

        $this
            ->from("alerts@evius.co", $from)
            ->subject($this->event->name)
            ->markdown('Mailers.silentAuction');
    }
}
