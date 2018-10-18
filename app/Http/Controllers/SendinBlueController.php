<?php

namespace App\Http\Controllers;

use App\SendinBlue;
use Illuminate\Http\Request;
use \App\MessageUser;
use Sendinblue\Mailin;
use Illuminate\Support\Facades\Log;

class SendinBlueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SendinBlue  $sendinBlue
     * @return \Illuminate\Http\Response
     */
    public function show(SendinBlue $sendinBlue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SendinBlue  $sendinBlue
     * @return \Illuminate\Http\Response
     */
    public function edit(SendinBlue $sendinBlue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SendinBlue  $sendinBlue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SendinBlue $sendinBlue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SendinBlue  $sendinBlue
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendinBlue $sendinBlue)
    {
        //
    }

     /**
     * Create a new Webhooks in Sendinblue API.
     *
     */
    public function activeWebHooks()
    {	
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        
		$data = array( "url" => "https://dev.mocionsoft.com/evius/eviusapilaravel/public/api/UpdateStatusMessage",
			"description" => "Update status of messages",
			"events" => array( 
                "delivered", "request" , "hard_bounce", "soft_bounce", 
                "blocked", "spam", "invalid_email", "deferred", "click", 
                "opened", "unique_opened", "unsubscribed"
			) ,
			"is_plat" => 0
        );
		var_dump($mailin->create_webhook($data));
	}

    /**
     * Update status in email sent by Sendinblue.
     *
     * @param  request  $request     
     */
    public function UpdateStatusMessagePOST(Request $request)
    {        
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        sleep(1);
        try{
        Log::debug('Recibiendo la informacion de los email para actualizar');
            $data = $request->json()->all();
        Log::debug('Data es '.json_encode($data));
            //search messageUser by message-id
            $message_id = ($data["message-id"]);
            $user_reason = ($data["reason"]);
            $user_status = ($data["event"]);
            //update the new status that is in data
            $message_user = MessageUser::where('sender_id', $message_id)
            ->orderBy('created_at','desc')->first();
            $message_user->status = $user_status;
            $message_user->status_message = $user_reason;
            
            if(is_null($message_user->history)){
                $message_user->history = array($user_status);
            }else{
                $array = $message_user->history;
                array_push($array, $user_status);    
                $message_user->history = $array;
            }
            $message_user->save(); 

        }catch(\Exception $e){
            var_dump($e);
        
        }
    }
}
