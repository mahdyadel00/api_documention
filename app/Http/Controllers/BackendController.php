<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Documentation;
// mo2men@report
use App\Models\ProductReport;
use App\Models\WalletLog;

// endEdit@reprot
use Auth;
use Session;

class BackendController extends Controller{
    public $data;
    public function __construct(){

        $this->middleware(function ($request, $next) {
            $this->data['user_rolrs'] = [];
            $this->data['all_pages'] = Page::orderBy('id','ASC')->get();
            $this->data['documented_requests'] = Documentation::where('seen',0)->orderBy('id','DESC')->get();
            // mo2men@report
            $this->data['product_reports'] = ProductReport::where('seen',0)->whereNotNull('product_id')->orderBy('id','DESC')->get();
            $this->data['submitted_reports'] = ProductReport::where('seen',0)->whereNotNull('submitted_order_id')->orderBy('id','DESC')->get();
            $this->data['withdrawal_reports'] = WalletLog::where('seen',0)->orderBy('id','DESC')->get();            
            // dd($this->data);
            // endEdit@report
            return $next($request);
        });
    }
}
