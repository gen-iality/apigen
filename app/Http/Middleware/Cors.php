<?php

namespace App\Http\Middleware;

use Closure;

class Cors {
    public function handle($request, Closure $next)
    {
        
        $urlComponent = parse_url($_SERVER['HTTP_REFERER']);
        $originURL = $urlComponent["scheme"]."://".$urlComponent["host"];
        if(isset($urlComponent["port"])) {
            $originURL .= ":".$urlComponent["port"];
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', $originURL)
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS,X-XSRF-TOKEN')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, X-XSRF-TOKEN");
    }

}
