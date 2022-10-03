<?php
// @midoshriks-4

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Reports;
use App\Models\Order;
use Validator;


class ReportsController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createReports($model, Request $request )
    {
        // var_dump('test');
        // exit;

        $data = [
            'report_status_id' => 'integer',
            'model' => 'string',
            'model_id' => 'string',
            'user_id' => 'integer',
            'comment' => 'string',
            // 'number' => 
        ];
        // $user->verification_code_phone = 


        // $validator = Validator::make($request->all(), $data);
        // var_dump($request->all());
        // exit;

        $report = new Reports;

        $report->report_status_id = $request->input('report_status_id');
        $report->model = $model;
        $report->number = '#'. rand(100000, 999999);
        // $Report->model_id = $request->input('model_id');
        $report->user_id = Auth()->user()->id;
        $report->comment = $request->input('comment');
        
        $report->save();

        return response()->json($report, 200);

    }


    public function user_reports()
    {
        return Reports::where('user_id', auth()->user()->id)->get();
    }
        
}
// <!-- @endEdit -->