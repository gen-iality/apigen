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
        $messagesUser = MessageUser::where('notification_id','0103017373ac0be0-ca26e3ea-2a07-4caf-9d15-f38583a36b56-000000');
        
        
        // Log::info($messagesUser);

        foreach ($messagesUser as $value)
        {
           if (!(isset($value->message_id) && isset($value->message)))
           {
                $value->message_id = '0103017373ac0be0-ca26e3ea-2a07-4caf-9d15-f38583a36b56-000000';
                $value->message = $event->message->getBody();
                $value->save();
           }
        }

        
        
        
        
    
    }

}
