<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Firestore;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * 
 * Documentación de manejar firestore desde PHP
 * https://github.com/kreait/laravel-firebase
 * https://googleapis.github.io/google-cloud-php/#/docs/cloud-firestore/
 */

class MeetingsController extends Controller
{

    //could be pending | accepted | rejected
    const  ACEPTED_STATUS  = "accepted";
    const  REJECTED_STATUS = "rejected";
    const  PENDING_STATUS  = "pending";

    public function __construct(Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->database = $firestore->database();
    }


    /**
     * Accepts a meeting 
     * @return \Illuminate\Http\Response  meeting updated data 
     */
    public function accept(Request $request, String $event_id, String $meeting_id){

        $status = SELF::ACEPTED_STATUS;
        $meeting = $this->changestatus($event_id, $meeting_id,$status);
        $data = ["id_user_requesting" => $meeting["owner_id"], "id_user_requested"=> last($meeting["attendees"]), "request_id"=>$meeting_id,"response"=>$status];
       
        app('App\Http\Controllers\InvitationController')->buildMeetingResponseMessage($data, $event_id);
        return $meeting;
        //envio del correo
        //redirigir a evius con el usuario logueado 
        
    }

    /**
     * Rejects a meeting 
     * @return \Illuminate\Http\Response  meeting updated data 
     */
    public function reject(Request $request, String $event_id, String $meeting_id){

        $status = SELF::REJECTED_STATUS;
        return $this->changestatus($event_id, $meeting_id,$status);
    } 


    private function changestatus($event_id, $meeting_id, $status){

        $path = "event_agendas/{$event_id}/agendas/{$meeting_id}";
        $d = $this->database->document($path);
        if  (!$d->snapshot()->exists()){
            throw  new ModelNotFoundException("Model doesn't exists");
        }

        $values = [['path' => 'request_status', 'value' => $status]];
        $d->update($values);
        return $d->snapshot()->data();
        
    }


    public function index(Request $request)
    {

        $event_id  = $request->input("event_id");
        $agenda_id = $request->input("agenda_id");
        $status    = $request->input("status");
        
        

        $event_id = "5f7f21217828e17d80642856";
        $agenda_id = "0LQairJbeDjor3TZL6Cd";
        $path = "event_agendas/{$event_id}/agendas/{$agenda_id}";

        // /event/{event_id}/meeting/{meeting_id}/accept

        $status = "accepted";
        $values = [['path' => 'request_status', 'value' => $status]];
        $d = $this->database->document($path);

        //$d->snapshot()->exists() 
        echo "<pre>";
        var_dump($d->snapshot()->exists()  );
        
        $d->update($values);
        $ss = $d->snapshot();
        echo "<pre>";
        var_dump($ss->data());
        return "hh";
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
}
