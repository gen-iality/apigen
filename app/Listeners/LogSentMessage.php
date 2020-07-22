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
            'message' => $event->message->getBody()
        ];

        
        $eviusMessage = new EviusMessage($data);


        $eviusMessage->save();

        // Log::info($event->message->getHeaders());

        // $emailId = $event->message->getId();        
        // $messagesUser = MessageUser::where('notification_id', $sesMessageId)->get();

        

        // Log::info($messagesUser);

        // foreach ($messagesUser as $value)
        // {
        //    if (!(isset($value->message_id) && isset($value->message)))
        //    {
        //         $value->message_id = $emailId;
        //         $value->message = $event->message->getBody();
        //         // $value->save();
        //    }
        // }      
    
    }

}