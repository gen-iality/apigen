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
        $message = Message::fromRawPostData();
        $validator = new MessageValidator();

        // Validate the message
        try {
            $validator->validate($message);
        } catch (InvalidSnsMessageException $e) {
            Log::error('SNS Message Validation Error: ' . $e->getMessage());
        }

        // find which notification is failing, you can notify the sender to change the correct email address
        $notification = Notification::where('ses_message_id', $message['Message']['mail']['messageId'])->first();

        Log::info('$notification: '.$notification);

        $messageUserModel->save();            

        return $request;                
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
