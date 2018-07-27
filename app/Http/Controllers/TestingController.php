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
        $event = Event::find("5b4f491cc065860378680a24");
        $eventuser = $event->eventUsers()->first();
        $eventuser->email = "juan.lopez@mocionsoft.com";
        $image = "https://storage.googleapis.com/herba-images/evius/events/8KOZm7ZxYVst444wIK7V9tuELDRTRwqDUUDAnWzK.png";
        $message = "mensaje";
        $subject = "[Invitación Máxim] kraken en Colombia";
   
       // var_dump($mail->build());
        Mail::to('juan.lopez@mocionsoft.com')
        ->send(new RSVP( $message, $event,$eventuser,$image,$subject ));
        var_dump(Mail::failures());
        return "ok";
    }
    public function sendemail2(){
        return "ahi";
    }   

    public function usuario(){
        return "usuario";
    }

}
