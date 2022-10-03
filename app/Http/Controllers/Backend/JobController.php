<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Job;
use Auth;
use Session;

class JobController extends BackendController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = "Jobs";
        $this->data['jobs'] = Job::orderBy('id','ASC')->paginate(10);
        return view('admin.job.index',$this->data);
    }

    public function add(){
        $this->data['title'] = "Add New Job";
        return view('admin.job.add',$this->data);
    }

    public function store(Request $request){

        $this->validate($request,array(
            'en_name'      => 'required|min:3',
            'ar_name'      => 'required|min:3',
        ));

        try {

            $job = new Job;
            $job->en_name = $request->en_name;
            $job->ar_name = $request->ar_name;
            $job->save();


            Session::flash('success','The Job has been created successfully!');

            return redirect()->route('admin.job');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }

    }

    public function edit($id){
        $job = Job::findOrFail($id);
        $this->data['title'] = $job->en_name;
        $this->data['job'] = $job;

        return view('admin.job.edit',$this->data);
    }

    public function update(Request $request,$id){

        $this->validate($request,array(
            'en_name'      => 'required|min:3',
            'ar_name'      => 'required|min:3',
        ));

        try {

            $job =  Job::findOrFail($id);
            $job->en_name = $request->en_name;
            $job->ar_name = $request->ar_name;
            $job->save();


            Session::flash('success','The Job has been updated successfully!');

            return redirect()->route('admin.job');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        Job::destroy($id);
        Session::flash('success','The Job has been deleted successfully!');
        return response()->json(['delete'=>true]);
    }
}
