<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class Localization
{

    public function handle($request, Closure $next)
    {
        if (array_key_exists($request->language, Config::get('app.supported_locales'))) {
            app()->setlocale($request->language);
        } else {
            abort(404);
        }

        return $next($request);
    }
}
