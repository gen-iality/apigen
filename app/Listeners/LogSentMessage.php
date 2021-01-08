<?php

namespace App\Listeners;

use App\MessageUser;
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
        
        $eventUser = isset($event->data["eventUser"]) ? $event->data["eventUser"] : null; 
        $messageUser = new MessageUser([            
            'email' => implode(',',array_keys($recipents)),             
        ]
        );
        
        if($eventUser){            
            $messageUser->event_user_id = $eventUser->_id;
            $messageUser->user_id = $eventUser->_id;
        }

        
        $sesMessageId = $event->message
                              ->getHeaders()
                              ->get('X-SES-Message-ID')
                              ->getValue();

                              
        
        $idEviusMessage = $event->data["messageLog"]->_id;


        $eviusMessage =  EviusMessage::find($idEviusMessage);
        $eviusMessage->server_message_id = $sesMessageId;
        $eviusMessage->save();
        
        $messageUser->message_id = $eviusMessage->_id;
        
        $messageUser->server_message_id = $sesMessageId;

        
        $messageUser->save();

        // $total_delivered = MessageUser::where('message_id' , $eviusMessage->_id)->where("satatus_message" , "Delivery")->get();
        // var_dump($total_delivered);die;
        // $mesage->total_delivered = count($total_delivered);
        
    }

}