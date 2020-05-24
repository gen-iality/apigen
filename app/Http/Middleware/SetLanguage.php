<?php

namespace App\Http\Middleware;

use Closure;

class SetLanguage
{

    public function handle($request, Closure $next)
    {

        setlocale(LC_ALL, "es_ES.UTF-8","es_ES","es");
        \Carbon\Carbon::setLocale(config('app.locale'));
        return $next($request);
    }

}
