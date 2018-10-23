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
        $eventUser) {
        $event = Event::find($eventUser->event_id);
        $event_location = ($event["location"]["FormattedAddress"]);
        $eventUser_name = ($eventUser["properties"]["name"]);
        $eventUser_id = $eventUser->id;

        $this->event = $event;
        $this->event_location = $event_location;
        $this->eventuser_name = $eventUser_name;
        $this->eventuser_id = $eventUser_id;
        $this->subject = "[Tu Ticket - " . $event->name . "]";
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

        $from = isset($this->event->organizer->name) ? $this->event->organizer->name . "(Evius)" : "(Evius)";
        $logo_evius = 'images/logo.png';
        $file = $this->eventuser_id . '_qr.png';
        $fullpath = storage_path('app/public/' . $file);

        try {
            $image = QRCode::text($this->eventuser_id)
                ->setSize(8)
                ->setMargin(4)
                ->setOutfile($fullpath)
                ->png();
            $img = Storage::get($file);
            var_dump($img);
            var_dump("public/".Storage::get($file)); 
            var_dump("app/public/".Storage::get($file)); 
            var_dump("/app/public/".Storage::get($file)); 
            $gfService->storeFile($img, $file);
            
            $this->qr =  $img;
            //$img = Storage::delete($file);
            $this->logo = url($logo_evius);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

        return $this
            ->from("apps@mocionsoft.com", $from)
            ->subject($this->subject)
            ->markdown('bookingConfirmed');
    }
}
