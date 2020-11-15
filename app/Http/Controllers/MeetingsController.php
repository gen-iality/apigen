<?php

namespace App\Http\Controllers;

use App\Attendee;
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
    const ACEPTED_STATUS = "accepted";
    const REJECTED_STATUS = "rejected";
    const PENDING_STATUS = "pending";

    public function __construct(Firestore $firestore)
    {
        $this->firestore = $firestore;
        $this->database = $firestore->database();
    }

    /**
     * Accepts a meeting
     * @return \Illuminate\Http\Response  meeting updated data
     */
    public function accept(Request $request, String $event_id, String $meeting_id)
    {

        $status = SELF::ACEPTED_STATUS;
        $meeting = $this->changestatus($event_id, $meeting_id, $status);
        $this->sendResponseMessage($meeting, $meeting_id, $event_id, $status);

        $attendee = Attendee::find(last($meeting["attendees"]));
        $pass = isset($attendee->properties['password']) ? $attendee->properties['password'] : null;
        return app('App\Http\Controllers\InvitationController')->generateLoginLinkAndRedirect($attendee->properties["email"], $pass, $event_id);
    }

    /**
     * Rejects a meeting
     * @return \Illuminate\Http\Response  meeting updated data
     */
    public function reject(Request $request, String $event_id, String $meeting_id)
    {

        $status = SELF::REJECTED_STATUS;
        $meeting = $this->changestatus($event_id, $meeting_id, $status);
        $this->sendResponseMessage($meeting, $meeting_id, $event_id, $status);

        $attendee = Attendee::find(last($meeting["attendees"]));
        $pass = isset($attendee->properties['password']) ? $attendee->properties['password'] : null;
        return app('App\Http\Controllers\InvitationController')->generateLoginLinkAndRedirect($attendee->properties["email"], $pass, $event_id);
    }

    private function sendResponseMessage($meeting, $meeting_id, $event_id, $status){
        $data = [
            "id_user_requesting" => $meeting["owner_id"],
            "id_user_requested" => last($meeting["attendees"]),
            "request_id" => $meeting_id,
            "response" => $status,
            "timestamp_start" => $meeting["timestamp_start"],

        ];
        app('App\Http\Controllers\InvitationController')->buildMeetingResponseMessage($data, $event_id);
    }

    private function changestatus($event_id, $meeting_id, $status)
    {

        $path = "event_agendas/{$event_id}/agendas/{$meeting_id}";
        $d = $this->database->document($path);
        if (!$d->snapshot()->exists()) {
            throw new ModelNotFoundException("Model doesn't exists");
        }

        $values = [['path' => 'request_status', 'value' => $status]];
        $d->update($values);
        return $d->snapshot()->data();

    }


    
    public function index(Request $request, $event_id)
    {
        $path = "event_agendas/{$event_id}/agendas";
        $documents = $this->database->collection($path)->documents();

        $count = 0;
        foreach($documents as $document){
            $count++;
            if ($document->exists()) {
                $data = $document->data();

                $attendees = [];
                // foreach($data['attendees'] as $attendee){
                //     $a = Attendee::find($attendee);
                //     $attendees[] = isset($a)?$a['properties']['email']: "--";
                // }

                $attendees=implode(",", $attendees);

                echo "{$data['timestamp_start']}, {$attendees}, {$data['request_status']}<br/>";
                //printf('Document data for document %s:' . PHP_EOL, $document->id());
                //print_r($document->data());
                //printf(PHP_EOL);
            } else {
                printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
            }
        }
        return "total: {$count}";


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
