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

        $data = [
            'response' => json_encode($response),
            'email_destinations' => json_encode($response['mail']['destination']),
            'status_message' => $response['eventType'],
            'message_id' => $response['mail']['messageId'],
            'timestamp_event' => $response['mail']['timestamp']
        ];

        // Log::info('$data: '.json_encode($data));
        $messageUserModel = new MessageUser($data);


        $messageUserModel->save();            

        return $messageUserModel;                
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
