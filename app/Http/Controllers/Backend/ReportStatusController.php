<?php
// @midoshriks-3
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\ReportStatus;
use App\Models\Reports;
use App\Models\ErrorLog;
use Session;
use App\USER;
use Validator;


class ReportStatusController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($model)
    {
        $this->data['title'] = 'support and help Reasons';
        $this->data['reports'] = ReportStatus::where('model', $model)->paginate(15);

        return view('admin.report_status.index', $this->data);
    }

    public function add()
    {
        $this->data['title'] = 'Add Reasons';
        return view('admin.report_status.add', $this->data);
    }

    public function store(Request $request)
    {

        $this->validate($request, array(
            'ar_name' => 'required|min:3',
            'en_name' => 'required|min:3',
        ));

        try {

            $reports = new ReportStatus;
            $reports->ar_name = $request->ar_name;
            $reports->en_name = $request->en_name;
            $reports->model = $request->model;


            $reports->save();

            // return view('admin.support_help.add', $this->data);


            Session::flash('success', 'The reasons has been created successfully!');
            return redirect()->route('admin.report_status', ['model' => $request->model]);


            return redirect()->back();
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id)
    {
        $reports = ReportStatus::findOrFail($id);
        $this->data['title'] = $reports->ar_name;
        $this->data['status'] = $reports;
        return view('admin.report_status.edit', $this->data);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'ar_name' => 'required|min:3',
            // 'en_name'      => 'required|min:3',
        ));

        try {

            $reports =  ReportStatus::findOrFail($id);
            $reports->ar_name = $request->ar_name;
            $reports->en_name = $request->en_name;


            $reports->save();


            Session::flash('success', 'The Suppoert reasons has been updated successfully!');
            return redirect()->route('admin.report_status', ['model' => $request->model]);
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        ReportStatus::destroy($id);
        Session::flash('success', 'The Suppoert reasons has been deleted successfully!');
        return response()->json(['delete' => true]);
    }

    // @midoshriks-4
    public function tickets($model)
    {
        $this->data['title'] = 'All tickets';

        // $tickets = Reports::latest();
        // if ($request->is_blocked && $request->is_blocked != "") {
        //     $tickets = $tickets->where('is_blocked', $request->is_blocked - 1);
        // }

        $this->data['tickets'] = Reports::where('model', $model)->paginate(15);

        // $this->data['ticket'] = Reports::all();
        // return Reports::all();

        return view('admin.support_help.all_tickets', $this->data);
    }

    public function change_block_reasons(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:reports,id',
            'is_blocked' => 'required|boolean',
        ]);

        $ticket = Reports::find($request->id);
        $ticket->is_blocked = $request->is_blocked;
        $ticket->is_active = !$request->is_blocked;
        $ticket->save();


        Session::flash('success', 'The Block reasons has been changed successfully!');
        $response = [
            'status' => true,
            //     'message' => "The reasons changed",
        ];
        return response()->json($response);
    }

    public function change_finished_reasons(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:reports,id',
            'is_finished' => 'required|boolean',
        ]);

        $ticket = Reports::find($request->id);
        $ticket->is_finished = $request->is_finished;
        $ticket->is_blocked = 0;
        $ticket->is_active = !$request->is_finished;
        $ticket->save();


        Session::flash('success', 'The finished reasons has been changed successfully!');
        $response = [
            'status' => true,
            //     'message' => "The reasons changed",
        ];
        return response()->json($response);
    }

    // @midoshriks@userSupport
    public function userSupport($user_id)
    {
        $this->data['title'] = "Support and help";

        $this->data['reports'] = Reports::where('user_id', $user_id)->get();
        // return $this->data['reports'];
        return view('admin.user.reports', $this->data);
    }
    // @endEdit

}
