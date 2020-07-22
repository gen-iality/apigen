<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Log;

use App\Jobs\SendNotificationEmailJob;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;

use Illuminate\Contracts\Mail\Mailer;

use Aws\Sns\Message;
use Aws\Sns\MessageValidator;

// use App\MessageUser;
use App\Message as EviusMessage;


class AwsSnsController extends Controller
{    
    public function updateSnsMessages(Request $request)
    {

        $count = 0;
        $response = $request->json()->all();
        
        Log::info($response['eventType']);
        $eviusmessage = EviusMessage::where('server_message_id', '=', $response['mail']['messageId']);

        // $data = [
        //     'response' => json_encode($response),
        //     'email_destinations' => json_encode($response['mail']['destination']),
        //     'status_message' => $response['eventType'],
        //     'notification_id' => $response['mail']['messageId'],
        //     'timestamp_event' => $response['mail']['timestamp']
        // ];

        $eviusmessage->update('total_delivered', count);    
        // if ($response['eventType'] == 'Delivery')
        // {
        //     if (isset($eviusmessage->get()['total_delivery']))
        //     {
        //         // count
        //         $eviusmessage->update('total_delivery', count);    
        //     }
// 
        // }
        // else if ($response['eventType'] == 'Clicked')
        // {
        //     $eviusmessage->total_clicked += 1;
        // }
        // else if ($response['eventType'] == 'Bounced')
        // {
        //     $eviusmessage->total_bounced += 1;
        // }
        // else if ($response['eventType'] == 'Complaint')
        // {
        //     $eviusmessage->total_complaint += 1;
        // }
        
        // $eviusmessage->save();            
        // $messageUserModel = new MessageUser($data);
        // $messageUserModel->save();            
        // Log::info('$data: '.json_encode($data));        

        return json_encode($request);                
    }


    public function testEmail(Mailer $mailer)
    {

        $data = [
            'nombre' => 'Marina'
        ];
                            
        $sesMessage = $mailer->send('Mailers/TicketMailer/plantillaprueba', $data, function ($message) {
            $message
                ->to('emilio.vargas@mocionsoft.com', 'dslfnsd')
                ->subject('prueba')
                ->from('alerts@evius.co'); 
                                
                $headers = $message->getHeaders();       

                // $eviusmessage->subject = $headers->get('Subject')->getValue();
                // $eviusmessage->message = $message->getBody();
                // $eviusmessage->save();

                
                $headers->addTextHeader('X-SES-CONFIGURATION-SET', 'ConfigurationSetSendEmail');

        });

        
        // Log::info($message);   
        // Log::info('$mens: '.$message->json()->all());          
                 
        

        // Log::info(json_encode($sesMessage));

        return 'Enviado';
    }

    // public function getMessage()
    // {
    //     $message = Message::fromRawPostData();

    // }


    /*
    public function sendSnsNotification(Request $request)
    {

        $message = json_decode($request->getContent(), true);
        $data = json_decode(data_get($message, 'MessageAttributes.Information.Value'), true);
        
        Log::info('data '.$data);

        if ($data['status'] === 'updated') {
            Log::info('Actualizando');
        } elseif ($message['status'] === 'deleted') {
            Log::info('Borrando');
        }

    }
    */

}