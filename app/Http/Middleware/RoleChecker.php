<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class RoleChecker
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->admin) {
            return $next($request);
        }

        abort(403);
    }
}