<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoMocion extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $html;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $html)
    {
      $this->email = $email;
      $this->html = $html;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("alerts@evius.co", "Quest")
            ->subject('¡Ganaste! reclama tu premio y descubre por qué la vida es Jeans')
            ->markdown('Mailers.CorreoMocion');
    }
}
