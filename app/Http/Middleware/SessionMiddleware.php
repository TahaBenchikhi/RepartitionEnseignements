<?php

namespace App\Http\Middleware;

use Closure;
use App\Session as Session;
class SessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $Cheking = Session::where('annee_universitaire',date("Y"))->get();
        if(!empty($Cheking->first()))
        {


            if(strtotime($Cheking[0]->datefin) > strtotime('now'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
        }
        else
        {
            return $next($request);
        }

    }
}
