<?php

namespace App\Mail;

use App\evaLib\Services\GoogleFiles;
use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade as PDF;
use QRCode;
use Storage;

class friendRequest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;//, Dispatchable, InteractsWithQueue;
    public $event;
    public $event_address;
    public $event_city;
    public $event_state;
    public $logo;
    public $attach;
    public $description;
    public $principal_title;
    public $img;
    public $link;
    public $title;
    public $sender;
    public $desc;
    public $subject;
    public $response;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event_id,$title,$desc,$subject,$img,$sender,$response,$email)
    {
        
        Log::debug("recibiendo event_user");
      
        $event = Event::find($event_id);
        $event_address = isset($event["location"]["FormattedAddress"])?($event["location"]["FormattedAddress"]):" ";
        $event_city = isset($event["location"]["City"])?($event["location"]["City"]):" ";
        $event_state = isset($event["location"]["state"])?($event["location"]["state"]):" ";
        $password = isset($eventUser["properties"]["password"]) ? $eventUser["properties"]["password"] : "mocion.2040";
        $pass = self::encryptdata($password);

        Log::debug("cargando datos event_user al correo");

        $principal_title = $title;
        $description = $desc;
        $link = config('app.api_evius') . "/singinwithemail?email=" . $subject ."&pass=".$pass;
        
        if($response){
            $link = config('app.api_evius') . "/singinwithemail?email=" . $email . '&innerpath=' . $event_id . "&request=" . $response  . "&pass=" . $pass;
        } 

        $this->response = $response;
        $this->email = $email;
        $this->link = $link;
        $this->$principal_title = $principal_title;
        $this->$img = $img;
        $this->$description = $description;
        $this->event_address =$event_address ;
        $this->event_city = $event_city;
        $this->event_state = $event_state;
        $this->event = $event;
        $this->title = $title;
        $this->desc = $desc;
        $this->sender = $sender;

        $this->subject = $subject;
        $gfService = new GoogleFiles();
   
        Log::debug("pasando a crear correo");
    }

    private function encryptdata($string){
        
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
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::debug("Construyendo el correo de ticket");
        $gfService = new GoogleFiles();
        $from = $this->event->organizer->name;
        $logo_evius = 'images/logo.png';
        $event = $this->event;
        $sender = $this->sender;
        $event_address = $this->event_address;
        $event_city = $this->event_city;
        $event_state = $this->event_state;
        $principal_title = $this->principal_title;
        $description = $this->description;
        $title = $this->title;
        $desc = $this->desc;
        $subject = $this->subject;
        $img = $this->img;

        return $this
        // ->attach($attachPath,[
        //     'as' => 'checkin',
        //     'mime' => 'image/png',
        // ])
        // ->attachData($pdf->download(),'boleta.pdf')
        ->from("alerts@evius.co", $sender)
        ->subject($subject)
        ->markdown('friendrequest');
        
    }
    
}
