<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;

use App\MessageUser;

class AwsSnsController extends Controller
{    
    public function updateSnsMessages(Request $request)
    {
        
        $response = $request->json()->all();

        // Log::info('$response '.json_encode($response));
        Log::info('linea 1 $response[mail][messageId] '.$response['mail']['messageId']);
        Log::info([
            // 'response' => json_encode($response),
            'email_destinations' => json_encode($response['mail']['destination']),
            'status_message' => $response['eventType'],
            'message_id' => $response['mail']['messageId']
            // 'timestamp_event' => $response['timestamp_event']
        ]);

        $messageUserModel = new MessageUser(
             [
                 'response' => json_encode($response),
                 'email_destinations' => json_encode($response['mail']['destination']),
                 'status_message' => $response['eventType'],
                 'message_id' => $response['messageId'],
             //  'timestamp_event' => $response['timestamp_event']
             ]
        );

        
        // $messageUserModel->save();            
        // return $response;                
        // return $arr;
    }

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
