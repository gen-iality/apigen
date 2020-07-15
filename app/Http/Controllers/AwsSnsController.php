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
        Log::info('updateSnsMessages');
        $response = $request->json()->all();

        Log::info('json_encode($response): '.json_encode($response));


        $messageUserModel = new MessageUser(
             [
                 'response' => $response,
                 'status' => $response['eventType'],
                 'email_destinations' => json_encode($response['mail']['destination']),
                 'status_message' => $response['eventType'],
                 'message_id' => $response['messageId'],
                 'timestamp_event' => $response['timestamp_event']
             ]
        );

        // Log::info('$messageUserModel '.strval($messageUserModel));
        // $messageUserModel->save();            
        return $response;                
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
