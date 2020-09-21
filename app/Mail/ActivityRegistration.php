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

/*
EJEMPLO GOOGLE CALENDAR
BEGIN:VCALENDAR
PRODID:-//Google Inc//Google Calendar 70.9054//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:REQUEST
BEGIN:VEVENT
DTSTART:20200921T230000Z
DTEND:20200922T000000Z
DTSTAMP:20200921T135603Z
ORGANIZER;CN=Juan Lopez:mailto:juan.lopez@mocionsoft.com
UID:55uocfrfj0tgjke44b5qjdje17@google.com
ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=ACCEPTED;RSVP=TRUE
 ;CN=Juan Lopez;X-NUM-GUESTS=0:mailto:juan.lopez@mocionsoft.com
ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=
 TRUE;CN=Apps Mocion;X-NUM-GUESTS=0:mailto:apps@mocionsoft.com
X-MICROSOFT-CDO-OWNERAPPTID:79798998
CREATED:20200921T135601Z
DESCRIPTION:-::~:~::~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~
 :~:~:~:~:~:~:~:~::~:~::-\nPlease do not edit this section of the descriptio
 n.\n\nThis event has a video call.\nJoin: https://meet.google.com/zdj-xadd-
 zwv\n(US) +1 530-426-2414 PIN: 363467803#\n\nView your event at https://www
 .google.com/calendar/event?action=VIEW&eid=NTV1b2NmcmZqMHRnamtlNDRiNXFqZGpl
 MTcgYXBwc0Btb2Npb25zb2Z0LmNvbQ&tok=MjUjanVhbi5sb3BlekBtb2Npb25zb2Z0LmNvbWJi
 MDhiNDhiMTUzN2QwZGE0NTQ4YWU4ZmJlZjZkMjg0MWMyOGZmODU&ctz=America%2FBogota&hl
 =en_GB&es=1.\n-::~:~::~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~
 :~:~:~:~:~:~:~:~:~::~:~::-
LAST-MODIFIED:20200921T135601Z
LOCATION:
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:titulo
TRANSP:OPAQUE
END:VEVENT
END:VCALENDAR
*/


$description = <<<EOF
-::~:~::~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~
:~:~:~:~:~:~:~:~::~:~::-\nPlease do not edit this section of the descriptio
n.\n\nThis event has a video call.\nJoin: https://meet.google.com/zdj-xadd-
zwv\n(US) +1 530-426-2414 PIN: 363467803#\n\nView your event at https://www
.google.com/calendar/event?action=VIEW&eid=NTV1b2NmcmZqMHRnamtlNDRiNXFqZGpl
MTcgYXBwc0Btb2Npb25zb2Z0LmNvbQ&tok=MjUjanVhbi5sb3BlekBtb2Npb25zb2Z0LmNvbWJi
MDhiNDhiMTUzN2QwZGE0NTQ4YWU4ZmJlZjZkMjg0MWMyOGZmODU&ctz=America%2FBogota&hl
=en_GB&es=1.\n-::~:~::~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~:~
:~:~:~:~:~:~:~:~:~::~:~::-
EOF;


        //Crear un ICAL que es un formato para agregar a calendarios y eso se adjunta al correo
        $this->ical = iCalCalendar::create($activity->name)
            ->appendProperty(
                TextPropertyType::create('URL', $event_link) 
            )
            ->appendProperty(
                TextPropertyType::create('METHOD', "REQUEST") 
            )
            // ->appendProperty(
            //     TextPropertyType::create('X-ALT-DESC', $activity->description.' <a href="'.$event_link.'">visita el evento</a>') 
            // )
            ->event(iCalEvent::create($activity->name)
                    ->startsAt($datetime_start)
                    ->endsAt($datetime_end)
                    ->description($description)
                    ->uniqueIdentifier($activity->_id)
                    ->createdAt(new \DateTime())
                    ->address(($activity->address) ? $activity->address : $event_link)
                    //->addressName(($activity->address) ? $activity->address : $event_link)
                //->coordinates(51.2343, 4.4287)
                    ->organizer('alerts@evius.co', $activity->organizer)
                    //->alertMinutesBefore(60, $activity->name . " empezará dentro de poco.")
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
                'mime' => 'text/calendar;charset="UTF-8";method=REQUEST',
                //'Content-Type' => 'text/calendar; charset="UTF-8"; method=REQUEST',
            ]) 
            ->markdown('rsvp.activity_registration');
    }

}