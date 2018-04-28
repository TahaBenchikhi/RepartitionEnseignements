<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EnseignantMiddleware
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
        if (!Auth::guest() && Session::get('type') != 'repartiteur') {
            // Si l'utilisateur est connecté est il n'est pas un repartiteur on le redirect vers la page principal
            return redirect('/');

        } else if (Auth::guest()) {
            // Si ce n'est pas un utilisateur de l'application on le force a ce connecté
            return redirect('/login');
        } else if (!Auth::guest() && Session::get('type') == 'repartiteur') {
            // Si c'est le repartiteur on le laisse acceder a cette page
            return $next($request);
        }

        return $next($request);

    }
}

