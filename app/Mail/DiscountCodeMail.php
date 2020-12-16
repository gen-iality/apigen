<?php

namespace App\Mail;

use App\Event;
use App\DiscountCode;
use App\Order;
use App\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Spatie\IcalendarGenerator\Components\Calendar as iCalCalendar;
use Spatie\IcalendarGenerator\Components\Event as iCalEvent;

class DiscountCodeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $code;
    public $order;
    public $event;
    public $eventName;
    public $codeTemplate;

   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code , $order , $codeTemplate)
    {   
        $event = isset($code->event_id) ? Event::findOrFail($code->event_id) : "";
        
        $this->code = $code;
        $this->order = $order;
        $this->event = $event;
        $this->codeTemplate = $codeTemplate;
    }


    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        
        if(isset($this->event->name))
        {   
            return $this
            ->from("alerts@evius.co", 'Ucronio')
            ->subject($this->event->name)
            ->markdown('Mailers.DiscountCode');
            //return $this->view('vendor.mail.html.message');
        }

        return $this
            ->from("alerts@evius.co", 'Ucronio Código de descuento')
            ->subject('Codigo de descuento')
            ->markdown('Mailers.DiscountCode');
            //return $this->view('vendor.mail.html.message');

        
    }
}