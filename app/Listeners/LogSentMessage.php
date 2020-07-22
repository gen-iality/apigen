<?php

namespace App\Listeners;

use App\MessageUser;

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
        

        $emailId = $event->message->getId();        
        $messagesUser = MessageUser::where('notification_id', $sesMessageId);
        
        
        // Log::info($messagesUser);

        foreach ($messagesUser as $value)
        {
           if (!(isset($value->message_id) && isset($value->message)))
           {
                $value->message_id = $emailId;
                $value->message = $event->message->getBody();
                $value->save();
           }
        }

        
        
        
        
    
    }

}
