<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\City;
use Auth;


class GeneralController extends ApiController {

    public function __construct(){
        parent::__construct();
    }
    
    public function cities(){
       return City::get();
    }
    
}