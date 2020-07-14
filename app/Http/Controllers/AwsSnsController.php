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

        Log::info('$response->mail '.$response->mail);



        // $messageUserModel = new MessageUser(
        //     [
        //         'response' => $response, 
        //         'status' => $response['eventType'], 
        //         'email' => $response['mail'], 
        //         'status_message', 
        //         'message_id', 
        //         'user_id', 
        //         'event_user_id'    
        //     ]
        // );
        // Log::info('$messageUserModel '.$messageUserModel);


        // $messageUserModel->response = $response






        
        //$messageUserModel->save();
        
        
        return json_encode($response);                
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
