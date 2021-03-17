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

        $messageUser = MessageUser::where('server_message_id' , $responseMail['messageId'])->first();
        

        if(isset($messageUser))
        {      
                        
            //
                // if(isset($messageUser->status) && $messageUser->status !== 'queued')
                // {
                //     $message = EviusMessage::find($messageUser->message_id);
                //     switch ($messageUser->status) 
                //     {
                //         case 'Send':
                //             $message->total_sent = isset($message->total_sent) ? $message->total_sent - 1 : 1;
                //             $message->save();
                //         break;
                //         case 'Delivery':
                //             $message->total_delivered = isset($message->total_delivered) ? $message->total_delivered - 1 : 0;
                //             $message->save();
                //         break;
                //         case 'Open':
                //             $message->total_opened = isset($message->total_opened) ? $message->total_opened - 1 : 0;
                //             $message->save();
                //         break;
                //     }

                // }            
            //$messageUserModel = MessageUserUpdate::updateOrCreate($dataMessageUser);                        
            $messageUser->status = $status_message;
            $messageUser->status_message = $status_message;
            $messageUser->save();
            
            app('App\Http\Controllers\RSVPController')->updateStatusMessageUser($status_message , $messageUser->message_id  );
            //
                
                        
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