<?php
/**
 *
 */
namespace App\evaLib\Services;

use App\Event;
use App\EventUser;
use App\Rol;
use App\State;
use App\User;

/**
 * Undocumented class
 */
class UserEventService
{

    const CREATED = 'CREATED';
    const UPDATED = 'UPDATED';

    /**
     * Undocumented function
     *
     * @param Event $event
     * @param [type] $userData
     * @return void
     */
    public static function importUserEvent(Event $event, $eventUserFields, $userData)
    {
        $result_status = null;
        $data = null;
        $message = "OK";

        if (!isset($userData['email'])) {
            throw new \Exception('email is missing and is required');
        }
        $email = $userData['email'];

        if (!isset($userData['uid'])) {
            $userData['uid'] = $email;
        }

        $matchAttributes = ['email' => $email];

        //Revisamos por el id si el usuario existe
        $user = User::updateOrCreate($matchAttributes, $userData);

        //test 5b855232cb22e03382263973 vent_id 5b7c4159c06586333f616385 userid 5b8551d1cb22e0338127b183
        $matchAttributes = ["event_id" => $event->id, "userid" => $user->id];

        $eventUserFields += $matchAttributes;

        //avoid saving uid as user properties
        if ($userData['uid']) {
              unset($userData['uid']);
        }

        $eventUserFields["properties"] = $userData;

        //User rol assigned by default
        if (!isset($eventUserFields["rol_id"])) {
            $rol = Rol::where('level', 0)->first();
            $eventUserFields["rol_id"] = $rol->_id;
        }
        $eventUserFields["rol_id"] = "5afaf644500a7104f77189cd";

        //eventUser booking status default value
        if (!isset($eventUserFields["state_id"])) {
            $temp = State::first();
            $eventUserFields["state_id"] = $temp->_id;
        }
        $eventUserFields["state_id"] = "5b0efc411d18160bce9bc706";

        $eventUser = EventUser::updateOrCreate($matchAttributes, $eventUserFields);

        $result_status = ($eventUser->wasRecentlyCreated) ? self::CREATED : self::UPDATED;

        //don't know why updateOrCreate doens't eager load related models
        $eventUser = EventUser::where($matchAttributes)->first();

        $data = $eventUser;

        return (object) [
            "status" => $result_status,
            "data" => $data,
            "message" => $message,
        ];
    }
    /**
     * Add Users to an event in draft status
     *
     * @param Event       $event    Where users are going to be added
     * @param Array[User] $usersIds Users to be added
     *
     * @return EventUser             eventUsers(attendees) added to the event
     */
    public static function addUsersToAnEvent(Event $event, $usersIds)
    {
        //cargamos varios EventUser por UserId.
        $eventUsers = EventUser::where('event_id', '=', $event->id)
            ->whereIn('userid', $usersIds)
            ->get();
        foreach($eventUsers as $eventUser){
            var_dump($eventUser->user->email);
        }
        

        $usersIdNotInEvent = self::getusersIdNotInEvent($eventUsers, $usersIds);

        foreach ($usersIdNotInEvent as $userId) {
            //Crear EventUser
            $eventUser = new EventUser;
            $eventUser->event_id = $event->id;
            $eventUser->userid = $userId;
            $eventUser->save();
            $eventUsers[] = $eventUser;
        }
        return $eventUsers;
    }

    private static function getusersIdNotInEvent($eventUsers, $usersIds)
    {
        $usersIdNotInEvent = array_filter($usersIds, function ($userId) use ($eventUsers) {
            $userIsInEvent = false;

            if (!$eventUsers || !count($eventUsers)) {
                return !$userIsInEvent;
            }

            foreach ($eventUsers as $eventUser) {
                if (isset($eventUser->userid) && $eventUser->userid == $userId) {
                    $userIsInEvent = true;
                }
            };
            return !$userIsInEvent;
        });

        return $usersIdNotInEvent;
    }
}
