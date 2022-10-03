<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Page;

use Auth;


class PageController extends ApiController {

    public function __construct(){
        parent::__construct();
    }

    public function index($id){
        $this->data['page'] = Page::find($id);
        return response($this->data);
    }


}
