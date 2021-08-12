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
    public $product;
    public $userAdmin;
    public $organization;
    public $obra;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataAuction, $event_id, $user, $product, $userAdmin)
    {   

        $event =  Event::find($event_id);

        $organization = Organization::find($event->organizer_id);

        foreach($product as $products)
        {
            $this->obra = '
            <td style="padding:5px 0">
                <img style="width:100%;max-width:600px;border-radius:20px"  alt="'.$this->event->name.'" src='.$this->product->image.' />
            <td style="padding:5px 0">';
        }
        

        $this->dataAuction = $dataAuction;
        $this->event = $event;
        $this->user = $user;
        $this->product = $product;
        $this->userAdmin = $userAdmin;               
        $this->organization = $organization;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   

        

        $from = !empty($this->event->organizer_id) ? Organization::find($this->event->organizer_id)->name : "Evius Event ";
        if($this->userAdmin)
        {   
            $this
            ->from("alerts@evius.co", $from)
            ->subject($this->event->name)
            ->markdown('Mailers.silentAuction');
        }else{
            $this
            ->from("alerts@evius.co", $from)
            ->subject($this->event->name)
            ->markdown('Mailers.silentAuctionUser');
        }
        
    }
}
