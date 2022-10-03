<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Auth;

class Guest
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard("api")->check()) {
            //dd("ddd");
            //return redirect('/home');
        }

        return $next($request);
    }
}
