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


use App\MessageUser;



class AwsSnsController extends Controller
{    
    public function updateSnsMessages(Request $request)
    {
        
        $response = $request->json()->all();
        
        $data = [
            'response' => json_encode($response),
            'email_destinations' => json_encode($response['mail']['destination']),
            'status_message' => $response['eventType'],
            'notification_id' => $response['mail']['messageId'],
            'timestamp_event' => $response['mail']['timestamp']
        ];

        $messageUserModel = new MessageUser($data);
        // Log::info('$data: '.json_encode($data));        

    

        $messageUserModel->save();            

        return json_encode($request);                
    }

    public function sendEmailSnsNotification($destinatary, array $remitent)
    {
        
        try {
            $this->dispatch(new SendNotificationEmailJob($destinatary, $remitent));
        } catch (Exception $e) {
            Log::error('Notification error' . $e->getMessage());
        }

    }

    public function testEmail(Mailer $mailer)
    {

        $sesMessage = '';

        $data = [
            'nombre' => 'Marina'
        ];
               
        
        $sesMessage = $mailer->send('Mailers/TicketMailer/plantillaprueba', $data, function ($message) {
            $message
                ->to('emilio.vargas@mocionsoft.com', 'dslfnsd')
                ->subject('prueba')
                ->from('alerts@evius.co'); 
                
                $headers = $message->getHeaders();       
                // var_dump($message);      
                
                $headers->addTextHeader('X-SES-CONFIGURATION-SET', 'ConfigurationSetSendEmail');

                // Log::info('$headers->get(Message-ID) '.$headers->get('Message-ID'));
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