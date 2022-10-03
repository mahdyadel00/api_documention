<?php
// <!-- @mido -->

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\SupportHelp;
use App\Models\Repoets;
use App\Models\Reports;
use App\Models\ReportStatus;

class SupportHelpController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $supportHelp = SupportHelp::get();
        // return $orders;
        return $supportHelp;
    }


    public function report_status()
    {
        return ReportStatus::where('model', 'support_help')->get();
    }


    public function report(Request $request)
    {

    }


    public function user_reports($model)
    {
        return Reports::where('user_id', auth()->user()->id)->where('model', $model)->get();
    }
    
}
// <!-- @endEdit -->