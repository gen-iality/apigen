<?php

namespace App\Http\Middleware;

use Closure;

class DomainMiddleware
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
        return $next($request);
        // $allowedDomains = config('app.domains');
        // $allowedDomains = explode(',', $allowedDomains);

        // $requestDomain = $request->header('origin');

        // if (in_array($requestDomain, $allowedDomains)) {
        //     return $next($request);
        // }

        // return response()->json(['message' => 'access denied'], 401);
    }
}
