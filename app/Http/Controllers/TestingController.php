<?php

namespace App\Http\Controllers;

use App;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use QRCode;

class TestingController extends Controller
{

    public function request($refresh_token)
    {
        $client = new Client();
        $url = "http://httpbin.org/post";
        $r =  $client->request('POST', $url, ['form_params' => ['test'=>'test']]);
        var_dump(json_decode($r->getBody()));
        $url = "https://securetoken.googleapis.com/v1/token?key=" . "AIzaSyATmdx489awEXPhT8dhTv4eQzX3JW308vc";
        /**
         * Generamos el cuerpo indicando
         * el valor del refresh_token, e indicacndo que  el token se va a refrescar
         */
        $body = ['grant_type' => 'refresh_token', 'refresh_token' => $refresh_token];
        /**
         * Enviamos los datos a la url
         * Enviamos por metodo post el cuerpo por medio de la url asignada
         */
        
        $response = $client->request('POST', $url, ['form_params' => $body]);
        var_dump(json_decode($response->getBody()));
        //var_dump((string) $response->getContents());
        
        return [true];
    }

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
        $file = 'qr/prueba2_qr.png';
        $image = QRCode::text("prueba2")
            ->setSize(8)
            ->setMargin(4)
            ->setOutfile($file)
            ->png();
        return $file;
    }

}
