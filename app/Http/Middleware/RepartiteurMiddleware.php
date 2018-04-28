<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RepartiteurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guest() && Session::get('type') != 'enseignant') {
            return redirect('/');
        } else if (Auth::guest()) {
            return redirect('/login');
        } else if (!Auth::guest() && Session::get('type') == 'enseignant') {
            return $next($request);
        }

        return $next($request);

    }
}

