<?php

namespace App\evaLib\Services;

use GuzzleHttp\Client;
use App\Url;
use PUGX\Shortid\Shortid;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
/**
 * Undocumented class
 */
class MMasivoService
{
    public static function sendSms($body)
    {
        $client = new Client([
            'base_uri' => 'http://api.messaging-service.com/sms/1/text/',
           ]);
        
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . config('app.authorization_mmasivo'),
        ];

        $options['headers'] = $headers;
        $options['body'] = json_encode($body);

        $promise = $client->postAsync('single', $options)->then(
            function (ResponseInterface $res) {
                $response = $res->getBody()->getContents();
                return $response;
            },
            function (RequestException $e) {
                return $e->getMessage();
            }
           );
    
           $response = $promise->wait();
    }

    public static function bodyInvitationEvent($name, $event_name, $link, $phone)
    {
        $link = config('app.evius_api') . '/invitation/' . $link;
        $body['to'] = $phone;
        $body['text'] = "¡Hola " . $name . "! Tu inscripción al evento " . $event_name . " ha sido exitosa. Puedes ingresar al evento mediante el siguiente enlace. ".$link. " ¡Te esperamos!";
        return $body;
    }

    public static function bodyCodeEventPMI($name, $survey_name, $code, $phone)
    {
        $body['to'] = $phone;
        $body['text'] = "¡Hola " . $name . "! El código asociado a la encuesta " . $survey_name . " es el siguiente: " . $code . ". ¡Gracias por participar!";
        return $body;
    }

    public static function bodySurveyEventPMI($name, $survey_name, $link, $phone)
    {
        $link = config('app.evius_api') . '/invitation/' . $link;
        $body['to'] = $phone;
        $body['text'] = "¡Hola " . $name . "! La encuesta " . $survey_name . " ya está disponible. Inicia sesion y respondela mediante el siguiente enlace. " . $link . " ¡Te esperamos!";
        return $body;
    }
}
