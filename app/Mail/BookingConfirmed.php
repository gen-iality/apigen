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

class BookingConfirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;//, Dispatchable, InteractsWithQueue;
    public $event;
    public $event_location;
    public $eventuser_name;
    public $eventuser_id;
    public $qr;
    public $logo;
    public $attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($eventUser)
    {
        Log::debug("recibiendo event_user");

        $event = Event::find($eventUser->event_id);
        $event_location = isset($event["location"]["FormattedAddress"])?($event["location"]["FormattedAddress"]):" ";
        $eventUser_name = isset($eventUser["properties"]["Nombres"]) ? $eventUser["properties"]["Nombres"] : $eventUser["properties"]["names"];
        $eventUser_id = $eventUser->id;

        Log::debug("cargando datos event_user al correo");

        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventuser_name = $eventUser_name;
        $this->eventuser_id = $eventUser_id;
        $this->subject = "[Tu Ticket - " . $event->name . "]";
        $gfService = new GoogleFiles();
        
        Log::debug("pasando a crear correo");

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachPath = url()->previous().'/api/generatorQr/'.$this->eventuser_id;
        $this->attach = $attachPath;
        Log::debug("Construyendo el correo de ticket");
        $gfService = new GoogleFiles();
        
        $from = $this->event->organizer->name;
        $logo_evius = 'images/logo.png';
        $file = $this->eventuser_id . '_qr.png';
        $fullpath = storage_path('app/public/' . $file);
        $event = $this->event;
        $eventuser = $this->eventuser_name;
        $ticket_id = $this->eventuser_id;
        $location =  $this->event_location;

        $pdf = PDF::loadview('pdf_bookingConfirmed', compact('event','eventuser','ticket_id','location'));
        $pdf->setPaper('legal','portrait');
        try {
            /*$image = QRCode::text($this->eventuser_id)
                ->setSize(8)
                ->setMargin(4)
                ->setOutfile($fullpath)
                ->png();
            */
                ob_start(); 
                QRCode::text($ticket_id)
                ->setSize(8)
                ->setMargin(4)
                ->png();
                $image = ob_get_contents();                

            //$img = Storage::get("public/" . $file);

            $url = $gfService->storeFile($image, $file);
            $this->qr = (string) $url;
            Log::debug("QR link: ".$url);
            //$img = Storage::delete("public/".$file);
            $this->logo = url($logo_evius);


        } catch (\Exception $e) {
            Log::debug("error: " . $e->getMessage());
            var_dump($e->getMessage());
        }
       
    
        return $this
            // ->attach($attachPath,[
            //     'as' => 'checkin',
            //     'mime' => 'image/png',
            // ])
            // ->attachData($pdf->download(),'boleta.pdf')
            ->from("apps@mocionsoft.com", $from)
            ->subject($this->subject)
            ->markdown('bookingConfirmed');
    }
}
