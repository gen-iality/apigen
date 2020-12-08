<?php

namespace App\Mail;

use App\Event;
use App\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Spatie\IcalendarGenerator\Components\Calendar as iCalCalendar;
use Spatie\IcalendarGenerator\Components\Event as iCalEvent;
use Spatie\IcalendarGenerator\PropertyTypes\TextPropertyType as TextPropertyType;

class ConfirmationPayU extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $event;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {        
       

    }
    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        
        return $this
            ->from("alerts@evius.co", "Ucronio")
            ->subject("PayU Pago exitoso")
            ->markdown('rsvp.payU');
    }
}