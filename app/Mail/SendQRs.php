<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\evaLib\Services\GoogleFiles;
use QRCode;

class SendQRs extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = 'Tremendo';
    public $qrs;
    public $eventUser;
    public $attendees;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($eventUser, $event, $attendees)
    {
        $this->eventUser = $eventUser;
        $this->event = $event;
        $this->attendees = $attendees;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // esta no guarda el qr
        // $this->qrs = [];
        // foreach ($this->attendees as $attendee) {
        //     ob_start();
        //     $qr = QRCode::text($attendee->_id)->setSize(6)->setMargin(2)->png();
        //     $page = ob_get_contents();
        //     ob_end_clean();
        //     $qr = base64_encode($page);
        //     array_push($this->qrs, ['code' => $qr, 'owner_qr' => $attendee->properties['names']]);
        // }

        try {
            $this->qrs = [];
            foreach ($this->attendees as $attendee) {
            $gfService = new GoogleFiles();
            ob_start(); 
            $qr = QRCode::text($attendee->_id)->setSize(8)->setMargin(4)->png();
            $page = ob_get_contents();
            ob_end_clean();
            $type = "png";
            $image = $page;
            $url = $gfService->storeFile($image, "".$attendee->_id.".".$type);

            $qr = (string) $url;
            array_push($this->qrs, ['code' => $qr, 'owner_qr' => $attendee->properties['names']]);
            }

        } catch (\Exception $e) {
            Log::debug("error: " . $e->getMessage());
            var_dump($e->getMessage());
        }

        return $this ->from("alerts@evius.co", "Evius Event")
        ->subject('evius')
        ->markdown('rsvp.sendQR');
    }
}
