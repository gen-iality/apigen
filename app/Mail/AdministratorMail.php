<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdministratorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public $event;
    public $names;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $event, $names)
    {
        $link = '';
        $auth = resolve('Kreait\Firebase\Auth');
        $firebasaUser = $auth->getUserByEmail($email);
        //dd($firebasaUser);
        // if ($firebasaUser->emailVerified) {
            $link = config('app.front_url') . "/eventadmin" . "/" . $event->_id . "/assistants";
            $this->link = $link;
            $this->event = $event;
            $this->names = $names;
        // }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('alerts@evius.co', "Invitacion administrador")
            ->subject('Invitacion administrador')
            ->markdown('rsvp.administratorInvitation');
    }
}
