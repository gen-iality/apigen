<?php

namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
        $originURL ="http://dev.mocionsoft.com:3000";

        $origin;

        if (array_key_exists('HTTP_ORIGIN', $_SERVER)) {
            $origin = $_SERVER['HTTP_ORIGIN'];
        }
        else if (array_key_exists('HTTP_REFERER', $_SERVER)) {
            $origin = $_SERVER['HTTP_REFERER'];
        } else {
            $origin = $_SERVER['REMOTE_ADDR'];
        }

        /*if (isset(  ['HTTP_REFERER'])) {
            $urlComponent = parse_url($_SERVER['HTTP_REFERER']);
            $originURL = $urlComponent["scheme"]."://".$urlComponent["host"];
            if (isset($urlComponent["port"])) {
                $originURL .= ":".$urlComponent["port"];
            }
        }*/
        if ($origin){
            $originURL = $origin;
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', $originURL)
            ->header('Vary', 'origin')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, X-XSRF-TOKEN");
    }

}
