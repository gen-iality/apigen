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


class ActivityRegistration extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels; //, Dispatchable, InteractsWithQueue;

    public $subject;
    public $activityAssistant;
    public $activity;
    public $ical = "";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $activityAssistant, $activity)
    {
        $this->activityAssistant = $activityAssistant;
        $this->activity = $activity;
        $this->subject = $subject;

        $event_link = 'https://evius.co/landing/'.$activity->event->_id;

        $datetime_start = \Carbon\Carbon::parse($activity->datetime_start);
        $datetime_end = ($activity->datetime_end)?\Carbon\Carbon::parse($activity->datetime_end):$datetime_start->addHour();

        //Crear un ICAL que es un formato para agregar a calendarios y eso se adjunta al correo
        $this->ical = iCalCalendar::create($activity->name)
            ->appendProperty(
                TextPropertyType::create('URL', $event_link) 
            )
            ->appendProperty(
                TextPropertyType::create('X-ALT-DESC', $activity->description.' <a href="'.$event_link.'">visita el evento</a>') 
            )
            ->event(iCalEvent::create($activity->name)
                    ->startsAt($datetime_start)
                    ->endsAt($datetime_end)
                    ->description($activity->description.' <a href="'.$event_link.'">visita el evento</a>')
                    ->uniqueIdentifier($activity->_id)
                    ->createdAt(new \DateTime())
                    ->address(($activity->address) ? $activity->address : "Virtual en web evius.co")
                    ->addressName(($activity->address) ? $activity->address : "Virtual en web evius.co")
                //->coordinates(51.2343, 4.4287)
                    ->organizer('soporte@evius.co', $activity->organizer)
                    ->alertMinutesBefore(60, $activity->name . " empezará dentro de poco.")
            )
            
            ->get();
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
                'mime' => 'text/calendar;charset=UTF-8;method=REQUEST',
            ])
            ->markdown('rsvp.activity_registration');
    }

}
