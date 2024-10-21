<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlumniMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role == 'alumni') {
            return $next($request);
        }

        return redirect('/alumni/dashboard')->with('error', 'You do not have alumni access.');
    }
}
