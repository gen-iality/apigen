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

class UserRegistrationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {   
        // var_dump($code);die;
        // var_dump($code->_id);    

        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {

        return $this
            ->from("alerts@evius.co", 'Ucronio')
            ->subject('Ucronio')
            ->markdown('Mailers.UserRegistration');
        //return $this->view('vendor.mail.html.message');
    }
}