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
use App\Message as EviusMessage;


class AwsSnsController extends Controller
{

    public function testreqS3()
    {
        Log::info('testS3');
        return 'testS3';
    }
    
    public function updateSnsMessages(Request $request)
    {        
        // Log::info('update');
        $count = 0;
        $response = $request->json()->all();
        Log::info('response '.json_encode($response));
        // Log::info('eventType '.json_encode($response)['eventType']);
        Log::info('notificationType '.json_encode($response)['notificationType']);
        
        $eviusmessage = EviusMessage::where('server_message_id', '=', $response['mail']['messageId'])->first();

        $data = [
            'response' => json_encode($response),
            'email_destinations' => json_encode($response['mail']['destination']),
            'status_message' => $response['eventType'],
            'notification_id' => $response['mail']['messageId'],
            'timestamp_event' => $response['mail']['timestamp']
        ];

        
        if (isset($eviusmessage))
        {
            $messageUserModel = new MessageUser($data);
            $messageUserModel->save();            
        }
                
        
        if (isset($response['eventType']))
        {
            if($response['eventType'] == 'Delivery')
            {
                Log::info('Delivery');
                $count = (isset($eviusmessage->total_delivered)) ? $eviusmessage->total_delivered++ : 1;                
                $eviusmessage->update(['total_delivered' => $count]);                
                            
            } 
            else if($response['eventType'] == 'Send')
            {
                Log::info('Send');
                $count = (isset($eviusmessage->total_sent)) ? $eviusmessage->total_sent++ : 1;
                $eviusmessage->update(['total_sent' => $count]);
                Log::info('count '.$count);
                Log::info('$eviusmessage->total_sent '.$eviusmessage->total_sent);
            }

            else if ($response['eventType'] == 'Click')
            {
                Log::info('Click');
                $count = (isset($eviusmessage->total_clicked)) ? $eviusmessage->total_clicked++ : 1;
                $eviusmessage->update(['total_clicked' => $count]);
                  
            }
            else if($response['eventType'] == 'Bounce')
            {
                Log::info('Bounce');
                $count = (isset($eviusmessage->total_bounced)) ? $eviusmessage->total_bounced++ : 1;
                $eviusmessage->update(['total_bounced' => $count]);
                
            }
            else if($response['eventType'] == 'Open')
            {    Log::info('Open');
                $count = (isset($eviusmessage->total_opened)) ? $eviusmessage->total_opened++ : 1;
                $eviusmessage->update(['total_opened' => $count]);
                Log::info('count '.$count);
                Log::info('$eviusmessage->total_opened '.$eviusmessage->total_opened);                
            }
            else if($response['eventType'] == 'Complaint')
            {    Log::info('Complaint');
                $count = (isset($eviusmessage->total_complained)) ? $eviusmessage->total_complained++ : 1;
                $eviusmessage->update(['total_complained' => $count]);
            }    

        }
                        
        return json_encode($request);                
    }
    
    public function testEmail(Mailer $mailer)
    {
        
        $data = [
            'nombre' => 'Marina'
        ];

        $emails = [
            'emilio.vargas@mocionsoft.com',
            'juan.lopez@mocionsoft.com',
            'apps@mocionsoft.com'
        ];      
                            
        $sesMessage = $mailer->send('Mailers/TicketMailer/plantillaprueba', $data, function ($message) use ($emails) {
            $message
                ->to($emails, 'dslfnsd')
                ->subject('prueba')
                ->from('alerts@evius.co'); 
                                
                $headers = $message->getHeaders();       

                // $eviusmessage->subject = $headers->get('Subject')->getValue();
                // $eviusmessage->message = $message;
                // Log::info(strval($eviusmessage->message));
                // $eviusmessage->save();
                
                $headers->addTextHeader('X-SES-CONFIGURATION-SET', 'ConfigurationSetSendEmail');
        });
        
        
        // Log::info($message);   
        // Log::info('$mens: '.$message->json()->all());          
        // Log::info(json_encode($sesMessage));

        return '<h1>Enviado</h1>';
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