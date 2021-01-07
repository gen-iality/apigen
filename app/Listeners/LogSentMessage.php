<?php

namespace App\Listeners;

use App\MessageUser;
use App\MessageUserUpdate;
use App\Message as EviusMessage;

use Log;


class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param $event
     * @return void
     */
    public function handle($event)
    {   
        
        $headers = $event->message->getHeaders();
        
        $recipents = $event->message->getTo();
        
        $eventUser = isset($event->data->eventUser) ? $event->data->eventUser : null; 
        $messageUser = new MessageUser([            
            'email_destinations' => implode(',',array_keys($recipents)),             
        ]
        );

        

        if($eventUser){
            $messageUser->event_user_id = $eventUser->_id;
        }

        // $message->messageUsers()->save($messageUser);


        
        // $arregloRecip = explode(': ', strval($recipents));
        // Log::info(sizeof(explode(' ', $arregloRecip[1])));
        
        $sesMessageId = $event->message
                              ->getHeaders()
                              ->get('X-SES-Message-ID')
                              ->getValue();

        $data = [
            'subject' => $event->message
                               ->getHeaders()
                               ->get('Subject')
                               ->getValue(),
            'server_message_id' => $sesMessageId, 
            'message' => $event->message->getBody(),
            'number_of_recipients' => count($recipents)
        ];

        
        $messageUser->server_message_id = $sesMessageId;
        
        $eviusMessage = new EviusMessage($data);
        $eviusMessage->save();

        // $messageUserUpdate = MessageUserUpdate::where("server_message_id" , $messageUser->server_message_id)->first();
        // var_dump($messageUserUpdate);die;
        // $messageUser->status_message = $sesMessageId;
        
        
        $messageUser->save();
        
    }

}