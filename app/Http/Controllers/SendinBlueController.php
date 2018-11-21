<?php

namespace App\Http\Controllers;

use App\SendinBlue;
use Illuminate\Http\Request;
use \App\MessageUser;
use Sendinblue\Mailin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

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
        $url = URL::previous();
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        
		$data = array( "url" => $url."/api/UpdateStatusMessage",
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
        //Log::debug('Recibiendo la informacion de los email para actualizar');
            $data = $request->json()->all();
        //Log::debug('Data es '.json_encode($data));
            //search messageUser by message-id
            $message_id = ($data["message-id"]);
            $user_reason = (isset($data["reason"]) ? $data["reason"] : $data["event"]);
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
            Log::debug('Se va a cambiar el total de los estados de los emails en la tabla messages');
            $message = Message::findOrfail($message_user->message_id);
            // var_dump($message_id);
            $add_status = $message->$user_status;
            $message->$user_status = $add_status + 1;
            
            $message->save(); 
            
            $message_user->save(); 

        }catch(\Exception $e){
            var_dump($e);
        
        }
    }

    /**
     * Update manually status in email sent by Sendinblue.
     *
     * This methods allows function for update manually status 
     * in email.
     * 
     * Once the method has been executed, search the database 
     * for those that are in a "queued" state limited by 50.
     * 
     * Then it executes the report of the emails sent in order 
     * to update the status of these.   
     */
    public function UpdateManuallyStatusMessage()
    {        
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        try{
            Log::debug('va hacer a consulta');  
        $message_users = MessageUser::where('sender_id', 'exists', true)
            ->where('status', 'queued')
            ->limit(100)->get();

        // var_dump($message_users[50]["sender_id"]);

       $ids = [];
        foreach ($message_users as $index => $message_user){
            $messageId = $message_user[$index]["sender_id"];
            Log::debug('se obtuvo el message_id'.$messageId);            
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
            Log::debug('se va a pedir el reporte de los datos en sendinblue con el message_id');
            // var_dump($mailin->get_report($data)["data"]);
            $data_mailin = isset($mailin->get_report($data)["data"])?$mailin->get_report($data)["data"][0]:"";
            Log::debug('Data es '.json_encode($data_mailin));
 
            $event  = $data_mailin["event"];
            $message_user->reason = isset($data_mailin["reason"])?$data_mailin["reason"]:$data_mailin["event"];
            $message_user->status = $event;

            $message_user->save();
            $ids[] = $message_user->id; 

         }
         return ["message"=>json_encode($ids)];
        
        }catch(\Exception $e){
           return ["message"=>$e->getMessage()];
        
        }
    }
}
