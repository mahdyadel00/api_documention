<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthApi{

    public function handle($request, Closure $next){
        
        // $request->headers->set('Accept', 'application/json');
         //$request->headers->set('Authorization', 'Bearer '.session()->get('api_token'));
            return $next($request);
    }
}
