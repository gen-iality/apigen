<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class genericMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->messsage = $message;
        $this->messsage  = "a";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this
        ->from("alerts@evius.co", 'eventos evius')
        ->subject('Contacto')
        ->markdown('genericMail');
        //return $this->view('genericMail');
    }
}
