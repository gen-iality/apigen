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
use Spatie\IcalendarGenerator\Components\Calendar as iCalCalendar;
use Spatie\IcalendarGenerator\Components\Event as iCalEvent;

class ActivityRegistration extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;//, Dispatchable, InteractsWithQueue;

    public $subject;
    public $activityAssistant;
    public $activity;
    public $ical = "";

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

        $datetime_start = \Carbon\Carbon::parse($activity->datetime_start);
        $datetime_end = \Carbon\Carbon::parse($activity->datetime_end);

        //Crear un ICAL que es un formato para agregar a calendarios y eso se adjunta al correo
        $this->ical = iCalCalendar::create($activity->name)
            ->event(iCalEvent::create($activity->name)
                    ->startsAt($datetime_start)
                    ->endsAt($datetime_end)
                    ->description($activity->description)
                    ->uniqueIdentifier($activity->_id)
                    ->createdAt(new \DateTime())
                    ->address(($activity->address) ? $activity->address : "Virtual en web evius.co")
                    ->addressName(($activity->address) ? $activity->address : "Virtual en web evius.co")
                //->coordinates(51.2343, 4.4287)
                    ->organizer('soporte@evius.co', $activity->organizer)
                    ->alertMinutesBefore(60, $activity->name . " empezará dentro de poco.")
            )->get();
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
        ->attachData($this->ical, 'ical.ics', [
            'mime' => 'text/calendar',
        ])
        ->markdown('rsvp.activity_registration');
        
    }
    
}
