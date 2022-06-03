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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data = $request->json()->all();
        $route = $request->route();
        $email = isset($data['properties']['email']) ? $data['properties']['email'] : $data['email'];

        $event = Event::findOrFail($route->parameter("event"));
        $user = Account::findOrFail($event->author_id);
        
        if ($email === $user->email) {
            return $next($request);
        }

        $events = DB::table('events')->where('author_id', $user->_id)->get();
        $eventUsers = 0;
        foreach ($events as $eve) {
            $users = DB::table('event_users')->where('event_id', $eve->_id)->where('properties.email', '!=', $user->email)->get();
            $eventUsers+= count($users);
        }
        if ($user->plan['availables']['users'] <= $eventUsers) {
            return response()->json(['message' => 'users limit exceeded'], 401);
        }
        return $next($request);
    }
}
