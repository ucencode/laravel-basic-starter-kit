<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLastActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user is logged in and loaded the page via the browser, update the last activity timestamp.
        if (auth()->check() && !$request->ajax()) {
            auth()->user()->setLastActivity();
        }

        return $next($request);
    }
}
