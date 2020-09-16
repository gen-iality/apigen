<?php

namespace App\Mail;
use App\Organization;
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

class ActivityRegistration extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;//, Dispatchable, InteractsWithQueue;

    public $subject;
    public $activityAssistant;
    public $activity;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$activityAssistant,$activity)
    {
        $this->activityAssistant = $activityAssistant;
        $this->activity = $activity;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $event = $this->activity->event;
        $from = !empty($event->organizer_id) ? Organization::find($event->organizer_id)->name : "Evius Event ";

        $subject = $this->subject;
        return $this
        ->from("alerts@evius.co", $from)
        ->subject($subject)
        ->markdown('rsvp.activity_registration');
        
    }
    
}
