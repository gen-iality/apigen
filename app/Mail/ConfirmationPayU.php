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

class ConfirmationPayU extends Mailable implements ShouldQueue
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
    public $onlylink;
    public $onetimelogin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    // private function encryptdata($string)
    // {

    //     // Store the cipher method
    //     $ciphering = "AES-128-CTR"; //config(app.chiper);

    //     // Use OpenSSl Encryption method
    //     $iv_length = openssl_cipher_iv_length($ciphering);
    //     $options = 0;

    //     // Non-NULL Initialization Vector for encryption
    //     $encryption_iv = config('app.encryption_iv');

    //     // Store the encryption key
    //     $encryption_key = config('app.encryption_key');

    //     // Use openssl_encrypt() function to encrypt the data
    //     $encryption = openssl_encrypt($string, $ciphering,
    //         $encryption_key, $options, $encryption_iv);

    //     // Display the encrypted string
    //     return $encryption;
    // }

    // private function createPass()
    // {
    //     $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    //     $input_length = strlen($permitted_chars);
    //     $random_string = '';
    //     for ($i = 0; $i < 10; $i++) {
    //         $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
    //         $random_string .= $random_character;
    //     }
    //     return $random_string;
    // }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        
        return $this
            ->from("alerts@evius.co", "PayUPago")
            ->subject("PayU Pago exitoso")
            ->markdown('rsvp.payU');


    }
}