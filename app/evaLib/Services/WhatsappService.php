<?php

namespace App\evaLib\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
/**
 * Undocumented class
 */
class WhatsappService
{
    public static function sendWhatSapp($number, $url_image, $user_name, $event_name, $signIn_url)
    {
       $client = new Client([
        'base_uri' => 'https://graph.facebook.com/v13.0/108791488635539/',
       ]);

       $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => config('app.authorization'),
       ];

       $options['headers'] = $headers;

       $body['messaging_product'] = 'whatsapp';
       $body['to'] = $number;//number 573114461222
       $body['type'] = 'template';
       $body['template']['name'] = 'invitacion_link_copy';
       $body['template']['language']['code'] = 'es';
       $body['template']['components'][0]['type'] = 'header';
       $body['template']['components'][0]['parameters'][0]['type'] = 'image';
       $body['template']['components'][0]['parameters'][0]['image']['link'] = $url_image;//url image
       $body['template']['components'][1]['type'] = 'body';
       $body['template']['components'][1]['parameters'][0]['type'] = 'text';
       $body['template']['components'][1]['parameters'][0]['text'] = $user_name;//name
       //segundo parametro
       $body['template']['components'][1]['parameters'][1]['type'] = 'text';
       $body['template']['components'][1]['parameters'][1]['text'] = $event_name;//event name
       //tercer parametro
       $body['template']['components'][1]['parameters'][2]['type'] = 'text';
       $body['template']['components'][1]['parameters'][2]['text'] = $signIn_url;//sign in link
       $body = json_encode($body);

       $options['body'] = $body;

       //dd($options);

       $promise = $client->postAsync('messages', $options)->then(
        function (ResponseInterface $res) {
            $response = $res->getBody()->getContents();
            return $response;
        },
        function (RequestException $e) {
            return $e->getMessage();
        }
       );

       $response = $promise->wait();
       //dd(json_decode($response));

    }
}
