<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{

    public function handle($request, Closure $next){

        // return 'test';
        // dd((Auth::guard('admin')->user()->role_id,[1,2]);
        // dd(Auth::guard('admin')->user());
        if (Auth::guard('admin')->check() && in_array(Auth::guard('admin')->user()->role_id,[1,2])){
            return $next($request);
        }

        return redirect('admin/login');
    }
}
