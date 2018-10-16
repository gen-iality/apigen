<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Http\Response;

class TestingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function auth(\Kreait\Firebase\Auth $fireauth)
    {
        /*$o = new User(
            [
                "name" => 'test' . time(),
                "email" => 'apps' . time() . "@mocionsoft.com",
            ]
        );
        $o->save();
        return $o;
        */
        $u = User::find("5bc51599cb22e0643e006173");
        $u->save();
        $r = $u;
        return $r;
    }

    public function sendemail(string $id)
    {
        // $data = $request->json()->all();
        // $event_id = $id;
        // $event = Event::find($event_id);
        // $eventuser = $event->eventUsers()->first();
        // $eventuser->email = "cesar.torres@mocionsoft.com";
        // $email = "cesar.torres@mocionsoft.com";
        // $image = "https://storage.googleapis.com/herba-images/evius/events/8KOZm7ZxYVst444wIK7V9tuELDRTRwqDUUDAnWzK.png";
        // $message = "mensaje";
        // $subject = "[Invitación Máxim] kraken en Colombia";

        // Mail::to($email)
        //     ->send(
        //         new BookingConfirmed($event, $eventUser, $image, $subject)
        //     );
        // return "ok";
        /*

    // var_dump($mail->build());
    Mail::to('juan.lopez@mocionsoft.com')
    ->send(new RSVP( $message, $event,$eventuser,$image,$subject ));
    var_dump(Mail::failures());
    return "ok";*/

    }
    public function sendemail2()
    {
        return "ahi";
    }

    public function usuario()
    {
        return "usuario";
    }

    public function qrTesting()
    {
        // $public_path = public_path();
        // $file = 'qr/qr.png';
        // $image = QRCode::url('https://eviusco.netlify.com/')
        //         ->setOutfile($file)
        //         ->png();

        // return $file;
    }

}
