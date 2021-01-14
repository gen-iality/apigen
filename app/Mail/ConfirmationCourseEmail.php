<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Event;
use App\Attendee;
use App\Account;
use App\User;

class ConfirmationCourseEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($event , $user)
    {   
    
        $this->event = $event;
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
        ->from("alerts@evius.co" , "Ucronio")
        ->subject('Confirmación de curso')
        ->markdown('rsvp.confirmationCourseEmail');
    }
}
