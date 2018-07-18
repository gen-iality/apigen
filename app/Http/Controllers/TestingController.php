<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RSVP;

use App\Event;

class TestingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendemail()
    {
        $event = Event::find("5b1060b20d4ed40e93533af3");
        $eventuser = $event->eventUsers()->first();
        $eventuser->email = "juan.lopez@mocionsoft.com";

        $mail = new RSVP($event,$eventuser);
        var_dump($mail->build());
        //Mail::to('juan.lopez@mocionsoft.com')
        //->send(new RSVP($event,$eventuser));

        return "ok";
    }
    public function sendemail2(){
        return "ahi";
    }   

}
