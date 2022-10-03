<?php
// @midoshriks-2
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\SupportHelp;
use App\Models\Reports;
use App\Models\Report_status;
use App\Models\ErrorLog;
use Session;
use App\USER;
use Validator;


class SupportHelpController extends BackendController{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = 'support and help status';
        $this->data['supports'] = SupportHelp::paginate(15);
        return view('admin.support_help.index', $this->data);
    }

    public function add(){
        $this->data['title'] = 'Add status';
        return view('admin.support_help.add', $this->data);
    }

    public function store(Request $request){
    
        $this->validate($request,array(
                'ar_title' => 'required|min:3',
                'en_title' => 'required|min:3',
                'ar_desc' => 'required|string',
                'en_desc' => 'required|string',
        ));

        try {

            $status = new SupportHelp;
            $status->ar_title = $request->ar_title;
            $status->en_title = $request->en_title;
            $status->ar_desc = $request->ar_desc;
            $status->en_desc = $request->en_desc;
    
            $status->save();

            // return view('admin.support_help.add', $this->data);


            Session::flash('success','The status has been created successfully!');
            return redirect()->route('admin.support_help');


            return redirect()->back();
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }

    }

    public function edit($id){
        $status = SupportHelp::findOrFail($id);
        $this->data['title'] = $status->ar_title;
        $this->data['status'] = $status;
        return view('admin.support_help.edit',$this->data);
    }

    public function update(Request $request,$id){

        $this->validate($request,array(
            'ar_title' => 'required|min:3',
            // 'en_name'      => 'required|min:3',
        ));

        try {

            $status =  SupportHelp::findOrFail($id);
            $status->ar_title = $request->ar_title;
            $status->en_title = $request->en_title;
            $status->ar_desc = $request->ar_desc;
            $status->en_desc = $request->en_desc;

            
            $status->save();


            Session::flash('success','The Suppoert status has been updated successfully!');
            return redirect()->route('admin.support_help');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        SupportHelp::destroy($id);
        Session::flash('success','The Suppoert status has been deleted successfully!');
        return response()->json(['delete'=>true]);
    }


}