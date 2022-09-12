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
        $account_sid = 'AC191a64a19726083a7e595dc55db15e85';
        $auth_token = '82d888af2b753c92e6a2afda9d3e9686';
        $twilio = new Client($account_sid, $auth_token);

        $message = $twilio->messages
            ->create($number, // to
                [
                    "messagingServiceSid" => "MG77e6cd4486da82e327d76e7cc63d6d95",
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
