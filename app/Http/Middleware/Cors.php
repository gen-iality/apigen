<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {     Log::debug("init CORS".__LINE__);
        $originURL = "https://eviusco.netlify.com";
        //$originURL = "http://localhost";
        if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
            $originURL = $_SERVER['HTTP_ORIGIN'];

        } else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
            $originURL = $_SERVER['HTTP_REFERER'];

        } else if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
            $originURL = $_SERVER['REMOTE_ADDR'];
        }
        Log::debug("finish CORS".__LINE__);
        return $next($request)
            ->header('Access-Control-Allow-Origin', $originURL)
            ->header('Vary', 'origin')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header("Access-Control-Allow-Headers",  "Origin, X-Requested-With, Content-Type, Accept, X-XSRF-TOKEN, new_token");
            //  ->header("Access-Control-Expose-Headers", "Origin, X-Requested-With, Content-Type, Accept, X-XSRF-TOKEN, new_token");
    }

}
