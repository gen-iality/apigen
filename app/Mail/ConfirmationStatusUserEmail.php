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
    
    public function __construct($user , $organization)
    {   
        $this->user = $user;
        $his->organization = $organization;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    
        return $this
        ->from($this->organization->email , $this->organization->displayname)
        ->subject('Confirmación estatus de usuario')
        ->markdown('rsvp.confirmationStatusUserEmail');
    }
}
