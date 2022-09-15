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
        $link = config('app.evius_api') . '/invitation/' . $link;

        $message = $twilio->messages
            ->create($number, // to
                [
                    "messagingServiceSid" => "MG77e6cd4486da82e327d76e7cc63d6d95",
                    "body" => "¡Hola " . $name . "! Tu inscripción al evento " . $event_name . " ha sido exitosa. Puedes ingresar al evento mediante el siguiente enlace. ".$link. " ¡Te esperamos!",
                ]
            );
    }
}
