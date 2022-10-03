<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontendController extends Controller{
    public $data;
    public function __construct(){

        $this->middleware(function ($request, $next) {
            // dd('f');
            return $next($request);
        });
    }
}
