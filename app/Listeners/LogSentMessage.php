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
        // Log::info('gettype($event) '.gettype($event));   
        

        
        // Log::info('$event->message->getId() '.$event->message->getId());

        $sesMessageId = $event->message
                              ->getHeaders()
                              ->get('X-SES-Message-ID')
                              ->getValue();
        

        $emailId = $event->message->getId();

        $messageUserModel = MessageUser::where('notification_id', '=', $sesMessageId);
        
        
        Log::info('$sesMessageId '.$sesMessageId);


        // var_dump($messageUserModel);


        // Log::info('$messageUserModel '.json_encode($messageUserModel));
    
    }
}
