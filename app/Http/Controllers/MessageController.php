<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MessageResource;
use \App\Message;
use App\Event;
use Sendinblue\Mailin;
use Illuminate\Support\Facades\Log;
/**
 * Undocumented class
 */
class MessageController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEvent(Request $request, $event_id)
    {
       $event = Event::findOrfail($event_id);

       //páginacion pordefecto
       $pageSize = (int) $request->input('pageSize');
       $pageSize = ($pageSize) ? $pageSize : config('app.page_size');
       return MessageResource::collection(
        $event->messages()->orderBy('created_at','desc')
        ->paginate($pageSize)
       );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Message::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Change status in email sent by Sendinblue.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response        
     */
    public function UpdateStatusMessage(Request $request)
    {        
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        sleep(1);
        try{

            $data = $request->json()->all();
            Log::debug("Se recibio la informacion ahora se esta buscando el message_user");
            Log::debug("data es".$data);
            //search messageUser by message-id
            $message_id = ($data["message-id"]);
            $user_reason = ($data["reason"]);
            $user_status = ($data["event"]);
            //update the new status that is in data

            $message_user = MessageUser::where('sender_id', $message_id)
            ->orderBy('created_at','desc')->first();
            Log::debug("Se recibio la informacion ahora se esta buscando el message_user".$message_user);

            $message_user->status = $user_status;
            // $message_user->history = $report;
            $message_user->status_message = $user_reason;

            if(is_null($message_user->history)){
                $message_user->history = [];   
            }
            $message_user->history[] = $user_status;
            

            $message_user->save(); 

        }catch(\Exception $e){
            var_dump($e);
        
        }
    }
}
