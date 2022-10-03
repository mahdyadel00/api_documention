<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\DistinctionStatus;
use Image;
use Auth;
use Session;

class DistinguishProductStatusController extends BackendController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
       
        $this->data['title'] = "Distinguish Statuses";
        $this->data['statuses'] = DistinctionStatus::orderBy('id','ASC')->paginate(10);
        return view('admin.distinguish_status.index',$this->data);
    }

    public function add(){
        $this->data['title'] = "Add New Distinguish Status";
        return view('admin.distinguish_status.add',$this->data);
    }

    public function store(Request $request){
        $this->validate($request,array(
            'en_name'      => 'required|unique:categories|min:3',
            'image'   => 'required|mimes:jpeg,png,jpg'
        ));

        try {

            $distinguish_status = new DistinctionStatus;
            $distinguish_status->en_name = $request->en_name;
            $distinguish_status->ar_name = $request->ar_name;
            $distinguish_status->en_description = $request->en_description;
            $distinguish_status->ar_description = $request->ar_description;
            $distinguish_status->price_for_once = $request->price_for_once;
            $distinguish_status->price_for_twice = $request->price_for_twice;
            $distinguish_status->price_for_three_times = $request->price_for_three_times;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . rand(1000,9999) . '.' . $extension;

                $ImageUpload = Image::make($image);
                $originalPath = public_path('uploads');
             //   dd($originalPath);
                $ImageUpload->save($originalPath."/".$imageName);

                // for save thumnail image
                $thumbnailPath = public_path('thumbs');
                $ImageUpload->resize(250,125);
                $ImageUpload = $ImageUpload->save($thumbnailPath."/".$imageName);

                $distinguish_status->image = $imageName;


            }
            $distinguish_status->save();


            Session::flash('success','The Distinguish Status has been created successfully!');

            return redirect()->route('admin.distinguish.statuses');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }

    }

    public function edit($id){
        $distinguish_status = DistinctionStatus::findOrFail($id);
        $this->data['title'] = $distinguish_status->en_name;
        $this->data['status'] = $distinguish_status;
        return view('admin.distinguish_status.edit',$this->data);
    }

    public function update(Request $request,$id){

        $this->validate($request,array(
            'en_name'      => 'required|min:3',
            //'image'   => 'mimes:jpeg,png,jpg'
        ));

        try {

            $distinguish_status =  DistinctionStatus::findOrFail($id);
            $distinguish_status->en_name = $request->en_name;
            $distinguish_status->ar_name = $request->ar_name;
            $distinguish_status->en_description = $request->en_description;
            $distinguish_status->ar_description = $request->ar_description;
            $distinguish_status->price_for_once = $request->price_for_once;
            $distinguish_status->price_for_twice = $request->price_for_twice;
            $distinguish_status->price_for_three_times = $request->price_for_three_times;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . rand(1000,9999) . '.' . $extension;

                $ImageUpload = Image::make($image);
                $originalPath = public_path('uploads');
                //   dd($originalPath);
                $ImageUpload->save($originalPath."/".$imageName);

                // for save thumnail image
                $thumbnailPath = public_path('thumbs');
                $ImageUpload->resize(250,125);
                $ImageUpload = $ImageUpload->save($thumbnailPath."/".$imageName);

                $distinguish_status->image = $imageName;


            }
            $distinguish_status->save();


            Session::flash('success','The Distinguish Status has been updated successfully!');

           return redirect()->route('admin.distinguish.statuses');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        DistinctionStatus::destroy($id);
        Session::flash('success','The Distinguish Status has been deleted successfully!');
        return response()->json(['delete'=>true]);
    }
}
