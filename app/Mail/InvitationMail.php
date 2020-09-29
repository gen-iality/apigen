<?php

namespace App\Mail;

use App\Event;
use App\Organization;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Spatie\IcalendarGenerator\Components\Calendar as iCalCalendar;
use Spatie\IcalendarGenerator\Components\Event as iCalEvent;
use Spatie\IcalendarGenerator\PropertyTypes\TextPropertyType as TextPropertyType;

class InvitationMail extends Mailable implements ShouldQueue
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
    public $organization_picture;
    public $subject;
    public $urlconfirmacion;
    public $image_header;
    public $type;
    public $image_footer;
    public $image_footer_default;
    public $activity;
    public $event_location;
    public $logo;
    public $ical = "";
    public $changePassword;    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $message, Event $event, $eventUser, string $image = null, $activity = null, string $subject = null, $image_header = null,$content_header = null, $image_footer = null,$changePassword = false)
    {

        $auth = resolve('Kreait\Firebase\Auth');
        $this->auth = $auth;
        $event_location = null;
        if (!empty($event["location"]["FormattedAddress"])) {
            $event_location = $event["location"]["FormattedAddress"];
        }
        if (!empty($event->alt_image)) {
           // $image = $event->alt_image;
        }
        $type = null;
        $email = isset($eventUser["properties"]["email"]) ? $eventUser["properties"]["email"] : $eventUser["email"];

        if (is_null($email)) {
            $email = $eventUser->properties["email"];
        }
        
        $organization_picture = !empty($event->styles["event_image"]) && strpos($event->styles["event_image"], 'htt') === 0 ? $event->styles["event_image"] : null;
        
        $userPassword = $eventUser["properties"]["password"];
        $password = isset($userPassword) ? $userPassword : "mocion.2040";
        
        

        if($changePassword){
            
            $password =  self::createPass();
            try {
                $updatedUser = $this->auth->changeUserPassword($eventUser['user']['uid'], $password);
                $properties = $eventUser["properties"];
                $properties["password"] = $password;
                $eventUser["properties"] = $properties;
                $eventUser->save();                 

            }catch (AuthError $e) {

                Log::error("temp password used. " . $e->getMessage());
                $password = "evius.2040";
                $updatedUser = $this->auth->changeUserPassword($userinfo->uid, $password);
            }
        }

        // var_dump($password);die;
        $eventUser_name = isset($eventUser["properties"]["names"]) ? $eventUser["properties"]["names"] : $eventUser["properties"]["displayName"];

        // lets encrypt !
        $pass = self::encryptdata($password);


        // Admin SDK API to generate the sign in with email link.
        $link = config('app.api_evius') . "/singinwithemail?email=" . urlencode($email) . '&innerpath=' . $event->_id . "&pass=" . urlencode($pass);
        $content_header = "<div style='text-align: center;font-size: 115%'>" . $content_header . "</div>";
        //$message = "<div style='margin-bottom:-100px;text-align: center;font-size: 115%'>" . $message   . "</div>";
        $this->organization_picture = $organization_picture;
        $this->type = $type;
        $this->image_header = $image_header;
        $this->link = $link;
        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventUser = $eventUser;
        $this->image = ($image) ? $image : null;
        $this->activity = $activity;
        $this->message = $message;
        $this->image_footer = $image_footer;
        $this->image_footer_default = (isset($event->styles) && isset($event->styles['banner_footer']) && $event->styles['banner_footer']) ? $event->styles['banner_footer'] : null;
        $this->eventUser_name = $eventUser_name;
        $this->password = $password;
        $this->email = $email;
        $this->urlconfirmacion = 'https://evius.co/landing/'.$event->_id;
        $this->changePassword = $changePassword;
        

        if (!$subject) {
            "Invitación a " . $event->name . "";
        }

        $date_time_from = (isset($eventUser->ticket) && isset($eventUser->ticket->activities) && isset($eventUser->ticket->activities->datetime_start)) ? \Carbon\Carbon::parse($eventUser->ticket->activities->datetime_start) : $event->datetime_from;
        $date_time_to = (isset($eventUser->ticket) && isset($eventUser->ticket->activities) && isset($eventUser->ticket->activities->datetime_end)) ? \Carbon\Carbon::parse($eventUser->ticket->activities->datetime_end) : $event->datetime_to;

        $this->subject = $subject;
        // $descripcion = "<div><a href='{$link}'>Evento Virtual,  ir a la plataforma virtual del evento  </a></div>";
        // $descripcion .= ($event->registration_message) ? $event->registration_message : $event->description;

        $descripcion = $event->name." Ver el evento en: ".$this->link;
     
        //Crear un ICAL que es un formato para agregar a calendarios y eso se adjunta al correo
        $this->ical = iCalCalendar::create($event->name)
            ->appendProperty(
                TextPropertyType::create('URL', $this->urlconfirmacion) 
            )
            ->appendProperty(
                TextPropertyType::create('METHOD', "REQUEST") 
            )
            ->event(iCalEvent::create($event->name)
                    ->startsAt($date_time_from)
                    ->endsAt($date_time_to)
                    ->description($descripcion)
                    ->uniqueIdentifier($event->_id)
                    ->createdAt(new \DateTime())
                    ->address(($event->address) ? $event->address :  $this->urlconfirmacion)
                    // ->addressName(($event->address) ? $event->address : "Virtual en web evius.co")
                //->coordinates(51.2343, 4.4287)
                    ->organizer('soporte@evius.co', $event->organizer->name)
                    ->alertMinutesBefore(60, $event->name . " empezará dentro de poco.")
            )->get();
    }

    private function encryptdata($string)
    {

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
        $from = !empty($this->event->organizer_id) ? Organization::find($this->event->organizer_id)->name : "Evius Event ";
        if($this->changePassword){
            return $this
            ->from("alerts@evius.co", $from)
            ->subject($this->subject)
            ->markdown('rsvp.changepassword');
        }
        if($this->event->send_custom_email)
        {
            return $this
            ->from("alerts@evius.co", $from)
            ->subject($this->subject)
            // ->attachData($this->ical, 'ical.ics', [
            //     'mime' => 'text/calendar',
            // ])
            ->markdown('rsvp.invitationcustom');
        //return $this->view('vendor.mail.html.message');
        }
        return $this
            ->from("alerts@evius.co", $from)
            ->subject($this->subject)
            ->attachData($this->ical, 'ical.ics', [
                'mime' => 'text/calendar;charset="UTF-8";method=REQUEST',
            ])
            ->markdown('rsvp.invitation');
        //return $this->view('vendor.mail.html.message');
    }
}