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

use App\MessageUserUpdate;
use App\MessageUser;
use App\Message as EviusMessage;


class AwsSnsController extends Controller
{
   
    public function updateSnsMessages(Request $request)
    {        
        
        $response = $request->json()->all();
        // Log::info('updateSnsMessages');
        // $headers = collect($request->header())->transform(function ($item) {
        //     return $item[0];
        // });
        // Log::info('json_encode($headers)'.json_encode($headers));
        // Log::info('$response '.json_encode($response));
        $responseMail = $response['mail'];                                
        // Log::info('$responseMail[destination] '. json_encode($responseMail['destination']));
        $status_message = null;

        if(isset($response['eventType']))
        {
            $status_message = $response['eventType']; 
        }
        else if (isset($response['notificationType']))
        {
            $status_message = $response['notificationType']; 
        }
                                
        
        $dataMessageUser = [
            'response' => json_encode($response),
            'email_destinations' => json_encode($responseMail['destination']),
            'status_message' => isset($status_message) ? $status_message : 'queued',
            'status' => isset($status_message) ? $status_message : 'queued',
            'notification_id' => $responseMail['messageId'],
            'timestamp_event' => $responseMail['timestamp']
        ];
        $messageUserModel = MessageUserUpdate::updateOrCreate($dataMessageUser);
        // $messageUserModel->save(); 
        
        $eviusmessage = EviusMessage::where("server_message_id" , $responseMail['messageId'] )->first();
        
        $count = 0;        
        if (isset($response['notificationType']) || isset($response['eventType']))
        {
            if($response['notificationType'] === 'Delivery' || $response['eventType'] === 'Delivery')
            {
                Log::info('Delivery');
                $count = isset($eviusmessage->total_delivered) ? $eviusmessage->total_delivered++ : 1; 
                if(isset($eviusmessage))
                {
                    $eviusmessage->update(['total_delivered' => $count]);                
                }
                else if(isset($eviusMessageModel))
                {
                    $eviusMessageModel->update(['total_delivered' => $count]);        
                }                                                            
            } 
            else if($response['notificationType'] === 'Send' || $response['eventType'] === 'Send')
            {
                Log::info('Send');
                $count = isset($eviusmessage->total_sent) ? $eviusmessage->total_sent++ : 1;
                
                if(isset($eviusmessage))
                {
                    $eviusmessage->update(['total_sent' => $count]);
                }
                else if(isset($eviusMessageModel))
                {
                    $eviusMessageModel->update(['total_sent' => $count]);        
                }                                                            
                
                
                Log::info('count '.$count);
                Log::info('$eviusmessage->total_sent '.$eviusmessage->total_sent);
            }

            else if ($response['notificationType'] === 'Click' || $response['eventType'] === 'Click')
            {
                Log::info('Click');
                $count = isset($eviusmessage->total_clicked) ? $eviusmessage->total_clicked++ : 1;
                
                if(isset($eviusmessage))
                {
                    $eviusmessage->update(['total_clicked' => $count]);
                }
                else if(isset($eviusMessageModel))
                {
                    $eviusMessageModel->update(['total_clicked' => $count]);        
                }       
                  
            }
            else if($response['notificationType'] === 'Bounce' || $response['eventType'] === 'Bounce')
            {
                Log::info('Bounce');
                $count = isset($eviusmessage->total_bounced) ? $eviusmessage->total_bounced++ : 1;
                
                if(isset($eviusmessage))
                {
                    $eviusmessage->update(['total_bounced' => $count]);
                }
                else if(isset($eviusMessageModel))
                {
                    $eviusMessageModel->update(['total_bounced' => $count]);        
                }                       
                
            }
            else if($response['notificationType'] === 'Open' || $response['eventType'] === 'Open')
            {    Log::info('Open');
                $count = isset($eviusmessage->total_opened) ? $eviusmessage->total_opened++ : 1;
                
                if(isset($eviusmessage))
                {
                    $eviusmessage->update(['total_opened' => $count]);
                }
                else if(isset($eviusMessageModel))
                {
                    $eviusMessageModel->update(['total_opened' => $count]);        
                }          
                
                Log::info('count '.$count);
                Log::info('$eviusmessage->total_opened '.$eviusmessage->total_opened);                
            }
            else if($response['notificationType'] === 'Complaint' || $response['eventType'] === 'Complaint')
            {    Log::info('Complaint');
                $count = isset($eviusmessage->total_complained) ? $eviusmessage->total_complained++ : 1;                
                if(isset($eviusmessage))
                {
                    $eviusmessage->update(['total_complained' => $count]);                
                }
                else if(isset($eviusMessageModel))
                {
                    $eviusMessageModel->update(['total_complained' => $count]);        
                }
            }    

        }
        $messageUser = MessageUser::where('server_message_id', '=', $responseMail['messageId'])->first();
        if(isset($messageUser))
        {
            $messageUser->status_message = $messageUserModel->status_message;
            $messageUser->status = $messageUserModel->status_message;
            $messageUser->save();         
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