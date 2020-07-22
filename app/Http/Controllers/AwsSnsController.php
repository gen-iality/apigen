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
        
        
        $eviusmessage = EviusMessage::where('server_message_id', '=', $response['mail']['messageId']);
        
        
        
        // $data = [
        //     'response' => json_encode($response),
        //     'email_destinations' => json_encode($response['mail']['destination']),
        //     'status_message' => $response['eventType'],
        //     'notification_id' => $response['mail']['messageId'],
        //     'timestamp_event' => $response['mail']['timestamp']
        // ];

        
        $this->setFieldsMessageCollection($response, 'Delivery', 'total_delivered');
        Log::info($eviusmessage->get());
        // if ($response['eventType'] == 'Delivery')
        // {
        //     if(isset($eviusmessage->total_delivered))
        //     {
        //         $count = $eviusmessage->total_delivered;
        //     }
        //     else
        //     {
        //         $count++;
        //     }                        
        //     $eviusmessage->update(['total_delivered' => $count]);
        // }
        // elseif ($response['eventType'] == 'Send') 
        // {
        //     if(isset($eviusmessage->total_sent))
        //     {
        //         $count = $eviusmessage->total_sent;
        //     }
        //     else
        //     {
        //         $count++;
        //     }                        
        //     $eviusmessage->update(['total_sent' => $count]);
        // }
        // elseif ($response['eventType'] == 'Click')
        // {
        //     if(isset($eviusmessage->total_clicked))
        //     {
        //         $count = $eviusmessage->total_clicked;
        //     }
        //     else
        //     {
        //         $count++;
        //     }                        
        //     $eviusmessage->update(['total_clicked' => $count]);
        // }
        // elseif ($response['eventType'] == 'Bounce')
        // {
        //     if(isset($eviusmessage->total_bounced))
        //     {
        //         $count = $eviusmessage->total_bounced;
        //     }
        //     else
        //     {
        //         $count++;
        //     }                        
        //     $eviusmessage->update(['total_bounced' => $count]);
        // }
        // elseif ($response['eventType'] == 'Open')
        // {
        //     if(isset($eviusmessage->total_opened))
        //     {
        //         $count = $eviusmessage->total_opened;
        //     }
        //     else
        //     {
        //         $count++;
        //     }                        
        //     $eviusmessage->update(['total_opened' => $count]);
        // }
        // elseif ($response['eventType'] == 'Complaint')
        // {
        //     if(isset($eviusmessage->total_complained))
        //     {
        //         $count = $eviusmessage->total_complained;
        //     }
        //     else
        //     {
        //         $count++;
        //     }                        
        //     $eviusmessage->update(['total_complained' => $count]);
        // }
        // 
        // $eviusmessage->save();            
        // $messageUserModel = new MessageUser($data);
        // $messageUserModel->save();            
        

        return json_encode($request);                
    }

    private function setFieldsMessageCollection(EviusMessage $eviusmessage, $response, $event, $field)
    {
        if ($response['eventType'] == $event)
        {
            if(isset($eviusmessage[$field]))
            {
                $count = $eviusmessage[$field];
            }
            else
            {
                $count++;
            }                        
            $eviusmessage->update([$field => $count]);
        }
       
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