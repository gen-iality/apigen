<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        $originURL = "http://dev.mocionsoft.com:3000";
        //$originURL = "http://localhost";
        if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
            $originURL = $_SERVER['HTTP_ORIGIN'];

        } else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
            $originURL = $_SERVER['HTTP_REFERER'];

        } else if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
            $originURL = $_SERVER['REMOTE_ADDR'];
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', $originURL)
            ->header('Vary', 'origin')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, X-XSRF-TOKEN");
        
    }

}
