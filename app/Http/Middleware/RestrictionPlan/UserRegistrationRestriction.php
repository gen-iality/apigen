<?php

namespace App\Http\Middleware\RestrictionPlan;

use Closure;
use Illuminate\Support\Facades\DB;
// models
use App\Event;
use App\Account;
use App\Attendee;

class UserRegistrationRestriction
{
    /**
     * Handle an incoming request.
     * 
     * Restriction of users allowed
     * according to the plan that the client has associated
     * If users are removed, they will still count towards the restriction. softdelete is used
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->json()->all();
        $route = $request->route();
        $email = isset($data['properties']['email']) ? $data['properties']['email'] : $data['email'];

	    // get event owner user
        $eventToRegisterUser = Event::findOrFail($route->parameter("event"));
        $user = Account::findOrFail($eventToRegisterUser->author_id);
        
	    // if the person to register is the owner of the event,
	    // the restriction does not apply.
        if ($email === $user->email) {
            return $next($request);
        }

        // there are users without a plan, they are old clients without restriction
        if(empty($user->plan_id)) {
            return $next($request);
        }

	    // fetch user events and validate total number of registered users
        $userEvents = Event::where('author_id', $user->_id)->get();
        $totalRegisteredUsers = 0;
        foreach ($userEvents as $event) {
            $usersAtTheEvent = DB::table('event_users')->where('event_id', $event['_id'])->where('properties.email', '!=', $user->email)->get();
            $totalRegisteredUsers += count($usersAtTheEvent);
        }

        if ($totalRegisteredUsers >= $user->plan['availables']['users']) {
            return response()->json(['message' => 'users limit exceeded'], 401);
        }

        return $next($request);
    }
}
