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
        $recipents = $event->message->getHeaders()->get('To');

        
        $arregloRecip = explode(': ', strval($recipents));
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
            'number_of_recipients' => sizeof(explode(' ', $arregloRecip[1]))
        ];

        
        $eviusMessage = new EviusMessage($data);


        $eviusMessage->save();
        
    }

}