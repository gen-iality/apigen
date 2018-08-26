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
    public static function importUserEvent(Event $event, $userData)
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

        $matchAttributes = ["event_id" => $event->id, "userid" => $user->id];
        $eventUserFields = $matchAttributes;
        $eventUser = EventUser::updateOrCreate($matchAttributes, $eventUserFields);

        $result_status = ($eventUser->wasRecentlyCreated) ? self::CREATED : self::UPDATED;

        //User rol assigned by default
        if (!isset($eventUser->rol_id)) {
            $rol = Rol::where('level', 0)->first();
            $eventUser->rol_id = $rol->_id;
        }

        //eventUser booking status default value
        if (!isset($eventUser->status)) {
            $temp = State::first();
            $eventUser->state_id = $temp->_id;
        }

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
