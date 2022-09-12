<?php

namespace App\evaLib\Services;

use Twilio\Rest\Client;
/**
 * Undocumented class
 */
class SmsService
{
    public static function sendSms($name, $event_name, $number, $link)
    {
        $account_sid = config('app.account_sid');
        $auth_token = config('app.auth_token');
        $twilio = new Client($account_sid, $auth_token);

        $message = $twilio->messages
            ->create($number, // to
                [
                    "messagingServiceSid" => config('app.messaging_service_sid'),
                    "body" => "Hola " . $name . ", te invitamos a participar en el evento " . $event_name . ". Ingresa a " . $link . " para registrarte.",
                ]
            );
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        // A Twilio number you own with SMS capabilities
        // $twilio_number = "+17075498649";

        // $client = new Client($account_sid, $auth_token);
        // $client->messages->create(
        //     // Where to send a text message (your cell phone?)
        //     $number,
        //     array(
        //         'from' => $twilio_number,
        //         'body' => '¡Hola ' . $name . '! Tu inscripción al evento ' .$event_name. ' ha sido exitosa. Puedes ingresar al evento mediante el siguiente enlace: ' .$link. ' ¡Te esperamos!'
        //     )
        // );

    }
}
