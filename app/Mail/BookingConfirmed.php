<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\evaLib\Services\GoogleFiles;

use App\Event;
use App\EventUser;
use QRCode;
use Storage;

class BookingConfirmed extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, Dispatchable, InteractsWithQueue;
    public $event;
    public $event_location;
    public $eventuser_name;
    public $eventuser_id;
    public $qr;
    public $logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $eventUser)
    {
        $event = Event::find($eventUser->event_id);
        $event_location = ($event["location"]["FormattedAddress"]);
        $eventUser_name =($eventUser["properties"]["name"]);
        $eventUser_id = $eventUser->id;

        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventuser_name = $eventUser_name;
        $this->eventuser_id = $eventUser_id;
        $this->subject   = "[Tu Ticket - ".$event->name."]" ;
        $this->build();

}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $gfService = new GoogleFiles();

        $from = isset($this->event->organizer->name)?$this->event->organizer->name."(Evius)":"(Evius)"; 
        $logo_evius = 'images/logo.png';
        $file =$this->eventuser_id.'_qr.png';
        $fullpath = storage_path('app/'.$file);

        $image = QRCode::text($this->eventuser_id)
                ->setSize(8)
                ->setMargin(4)
                ->setOutfile($fullpath)
                ->png();

        $img = Storage::get($file);
        $this->qr = $gfService->storeFile($img, $file);
        $img = Storage::delete($file);
        $this->logo = url($logo_evius);

        return $this
        ->from("apps@mocionsoft.com", $from)
        ->subject($this->subject)
        ->markdown('bookingConfirmed');        
    }
}
