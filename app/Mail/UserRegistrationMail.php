<?php

namespace App\Mail;


use App\Account;
use App\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $organization;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user , $organization)
    {   
        
        $organization = Organization::find($organization);
        $organization = Account::find($organization->author);
        $this->user = $user;        
        $this->organization = $organization;
    }


    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        
        return $this
            ->from($this->organization->email, $this->organization->displayName)
            ->subject('Registro exitoso')
            ->markdown('Mailers.UserRegistration');
        //return $this->view('vendor.mail.html.message');
    }
}