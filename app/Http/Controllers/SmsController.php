<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\evaLib\Services\SmsService;
use App\evaLib\Services\WhatsappService;
use App\Event;
use App\Attendee;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        $event = Event::find('631b53e3b0c12034d2664b72');
        $has_extension = false;
        foreach ($event->user_properties as $propertie) {
            $has_extension = $propertie->name == 'extension' ? true : false;
        }
        if ($has_extension) {
            //$eventUser = Attendee::find('631b8ff2740d784e53256272');
            $eventUser = Attendee::find('631f3ef64e43b153c404d773');
            $code = $eventUser["properties"]["code"];
            $codeWhatsapp = substr($code, 1);//sin el +
            $number = $eventUser["properties"]["extension"];
            $numberWhatsapp = $codeWhatsapp . $number;

            $auth = resolve('Kreait\Firebase\Auth');
            $email = $eventUser->properties["email"];
            //$email = 'andres.cadena@evius.co';
            $link = '';
            $firebasaUser = $auth->getUserByEmail($email);
            //dd($firebasaUser);
            if ($firebasaUser->emailVerified) {
                //dd(config('app.front_url'));
                $link = $auth->getSignInWithEmailLink(
                    $email,
                    [
                        "url" => config('app.front_url') . "/loginWithCode?email=". urlencode($email) . "&event_id=" . $event->id,
                    ]    
                );
                //dd($link);
            }else {
                $link = $auth->getEmailVerificationLink(
                    $email,
                    [
                        "url" => config('app.front_url') . "/loginWithCode?email=". urlencode($email) . "&event_id=" . $event->_id,
                    ]    
                );
            }
            //dd($numberWhatsapp);
            WhatsappService::sendWhatsapp($numberWhatsapp, $event->styles["banner_image"], $eventUser->properties["names"], $event->name, $link);
            $numberSms = $code . $number;//con el +
            SmsService::sendSms($eventUser->properties["names"], $event->name, $numberSms, $link);
            //dd($eventUser);
        }
        //dd($has_extension);
        dd("send");





        $auth = resolve('Kreait\Firebase\Auth');
        $email = 'sebastian.rincon@mocionsoft.com';
        //$email = 'andres.cadena@evius.co';
        $link = '';
        $firebasaUser = $auth->getUserByEmail($email);
        //dd($firebasaUser);
        if ($firebasaUser->emailVerified) {
            //dd(config('app.front_url'));
            $link = $auth->getSignInWithEmailLink(
                $email,
                [
                    "url" => config('app.front_url') . "/loginWithCode?email=". urlencode($email) . "&event_id=" . '62ac94fae0349839442c1d76',
                ]    
            );
            //dd($link);
        }
        //dd($firebasaUser);


        //dd($link);

        WhatsappService::sendWhatsapp(
            '525522993342', 
            'https://storage.googleapis.com/eviusauthdev.appspot.com/evius/events/9MPlNgPQXEFZmydJFIDEmGyHhZPQVn9QTJsjW2R8.png',
            'Mauro',
            'Capacitaciones Evius',
            $link
        );
        //dd('ok');
        //SmsService::sendSms('Andres', 'Capacitaciones Evius', '+525624590075', $link);
        dd("enviado");
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '+573143232830',
            'from' => 'Nexmo-Evius',
            'text' => 'Sms de prueba'
        ]);
    }
}
