<?php

namespace App\evaLib\Services;
use App\Attendee;
use App\Rol;
use App\Mail\UserRolChangeMail;
use Mail;



class UpdateRolEventUserAndSendEmail 
{
    /**
     * 
     */
    public static function UpdateRolEventUserAndSendEmail($request, $event_id, $eventUser_id)
    {       
        $data = $request->json()->all();

        $eventUser = Attendee::find($eventUser_id);
        $eventUser->fill($data);
        $eventUser->save();

        Mail::to($eventUser['properties']['email'])
            ->queue(
                new UserRolChangeMail($event_id, $eventUser , $data['rol_id'])
            );
        
        return $eventUser;
    }
}