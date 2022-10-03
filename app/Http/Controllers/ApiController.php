<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApiController extends Controller{
    public $data;
    public function __construct(){

        $this->middleware(function ($request, $next) {
           
          //  $request->header()
            return $next($request);
        });
    }
}
