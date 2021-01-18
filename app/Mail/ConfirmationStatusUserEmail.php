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

class ConfirmationStatusUserEmail extends Mailable implements ShouldQueue
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
        ->from("ucronio@evius.co" , "Ucronio")
        ->subject('Confirmación estatus de profesor')
        ->markdown('rsvp.confirmationStatusUserEmail');
    }
}
