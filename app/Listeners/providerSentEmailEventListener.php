<?php

namespace App\Listeners;

use App\Events\providerSentEmail;
use Illuminate\Support\Facades\Log;

use Sendinblue\Mailin;
use App\MessageUser;

/**
     * Class providerSentEmailEventListener.
     *
     * The next class belongs to the providerSentEmail event 
     * and was created to obtain the values ​​that are 
     * generated when sending emails through sendinblue 
     * to obtain a record of these
     * 
     */

class providerSentEmailEventListener
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
     * In the function, the variable $ mailin is created first, which is what allows the
     * search for emails sent by sendinblue
     * Then the value of the message-id that is generated by sending the mail is taken
     * Once obtained that, the array is created with which the mail sent will be consulted
     * to obtain the data that will be stored in the BD
     * Once obtained these data and proceed to save in the BD.
     * 
     * 
     * Another procedure that we execute in the SendinBlueTransport file is the impelementation
     * of a patch that executes the event inside this file without having to modify the code of this
     * 
     * Before executing the composer install, the following command must be executed so that the patches can be applied: 
     * 
     * composer require "cweagans/composer-patches:~1.0"
     * 
     * 
     * @param  providerSentEmail  $event
     * @return void
     */
    public function handle(providerSentEmail $event)
    {
        
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        if(!isset($event->res['data']['message-id'])){
            return 0;
        }
        $messageId=($event->res['data']['message-id']);
        $array_email = array_keys($event->message->getTo());
        $user_email= reset($array_email);
        
        $data = array( 
            // "limit" => 10000,
            // "start_date" => "",
            // "end_date" => "",
            // "offset" =>4,
            // "date" => "2018-10-03",
            // "days" => 0,
            // "email" => "",
            // "event" => "",
            // "tags" => "",
            "message_id" => $messageId,
            // "template_id" => 0
        );
        sleep(1);
        try{

            $message_user = MessageUser::where('email', $user_email)
            ->where('sender_id', 'exists', false)
            ->orderBy('created_at','desc')->first();
        
            if(is_null($message_user)){
                return "false";
            }else{
                $message_user->sender_id = $messageId;
                $message_user->save(); 
            }

    }catch(\Exception $e){
        var_dump($e);
    
    }
}
}
