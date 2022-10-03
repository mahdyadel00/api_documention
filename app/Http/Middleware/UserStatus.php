<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserStatus{

    public function handle($request, Closure $next,$status){
       
        if(auth()->guard('api')->check()){
            $user = auth()->user();
            if($status == 'block' && $user->status == 'blocked'){
                return response()->json(['status' => false , 'message' => 'User Blocked']);
            }else if($status == 'deactivated' && $user->status == 'deactivated' ){
                 return response()->json(['status' => false , 'message' => 'User Deactivated']);
            }
        }
        return $next($request);
    }
}
