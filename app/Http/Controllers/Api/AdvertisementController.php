<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Advertisement;

use Auth;


class AdvertisementController extends ApiController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['advertisement'] = Advertisement::where('is_active',1)->orderBy('id','ASC')->get();
        return response($this->data);
    }

    public function show($id){
        $this->data['advertisement'] = Advertisement::find($id);
        return response($this->data);
    }


}
