<?php

namespace App\Mail;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Spatie\IcalendarGenerator\Components\Calendar as iCalCalendar;
use Spatie\IcalendarGenerator\Components\Event as iCalEvent;

class RSVP extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $eventUser_name;
    public $eventuser_id;
    public $eventuser_lan;
    public $password;
    public $email;
    public $event;
    public $eventUser;
    public $image;
    public $link;
    public $message;
    public $footer;
    public $subject;
    public $urlconfirmacion;
    public $event_location;
    public $logo;
    public $ical = "";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $message, Event $event, $eventUser, string $image = null, $footer = null, string $subject = null)
    {

        $auth = resolve('Kreait\Firebase\Auth');
        $this->auth = $auth;
        $event_location = null;
        if (!empty($event["location"]["FormattedAddress"])) {
            $event_location = $event["location"]["FormattedAddress"];
        }
        if (!empty($event->alt_image)) {
            $image = $event->alt_image;
        }
        $email = isset($eventUser["properties"]["email"]) ? $eventUser["properties"]["email"] : $eventUser["email"];

        if (is_null($email)) {
            $email = $eventUser->properties["email"];
        }

        $password = isset($eventUser["properties"]["password"]) ? $eventUser["properties"]["password"] : "mocion.2040";
        $eventUser_name = isset($eventUser["properties"]["names"]) ? $eventUser["properties"]["names"] : $eventUser["properties"]["displayName"];

        // lets encrypt !
        $pass = self::encryptdata($password);

        // Admin SDK API to generate the sign in with email link.
        $link = config('app.api_evius') . "/singinwithemail?email=" . urlencode($email) . '&innerpath=' . $event->_id . "&pass=" . urlencode($pass);

        $this->link = $link;
        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventUser = $eventUser;
        $this->image = ($image) ? $image : null;
        $this->message = $message;
        $this->footer = $footer;

        $this->eventUser_name = $eventUser_name;
        $this->password = $password;
        $this->email = $email;
        if (!$subject) {
            "Invitación a " . $event->name . "";
        }
        $this->subject = $subject;
        $descripcion = "<div><a href='{$link}'>Evento Virtual,  ir a la plataforma virtual del evento  </a></div>";
        $descripcion .= ($event->registration_message) ? $event->registration_message : $event->description;

        //Crear un ICAL que es un formato para agregar a calendarios y eso se adjunta al correo
        $this->ical = iCalCalendar::create($event->name)
            ->event(iCalEvent::create($event->name)
                    ->startsAt($event->datetime_from)
                    ->endsAt($event->datetime_to)
                    ->description($descripcion)
                    ->uniqueIdentifier($event->_id)
                    ->createdAt(new \DateTime())
                    ->address(($event->address) ? $event->address : "Virtual en web evius.co")
                    ->addressName(($event->address) ? $event->address : "Virtual en web evius.co")
                //->coordinates(51.2343, 4.4287)
                    ->organizer('soporte@evius.co', $event->organizer->name)
                    ->alertMinutesBefore(60, $event->name . " empezará dentro de poco.")
            )->get();

    }

    private function encryptdata($string)
    {
        return $string;
        // Store the cipher method
        $ciphering = "AES-128-CTR"; //config(app.chiper);

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = config('app.encryption_iv');

        // Store the encryption key
        $encryption_key = config('app.encryption_key');

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($string, $ciphering,
            $encryption_key, $options, $encryption_iv);

        // Display the encrypted string
        return $encryption;
    }

    private function createPass()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < 10; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;

    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $logo_evius = 'images/logo.png';
        $this->logo = url($logo_evius);
        $from = $this->event->organizer->name;

        return $this
            ->from("alerts@evius.co", $from)
            ->subject($this->subject)
            ->attachData($this->ical, 'ical.ics', [
                'mime' => 'text/calendar',
            ])
            ->markdown('rsvp.rsvpinvitation');
        //return $this->view('vendor.mail.html.message');
    }
}