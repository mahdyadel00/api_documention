<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\City;
use Image;
use Auth;
use Session;

class CityController extends BackendController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = "Cities";
        $this->data['cities'] = City::paginate(15);
        return view('admin.city.index',$this->data);
    }

    public function add(){
        $this->data['title'] = "Add New City";
        return view('admin.city.add',$this->data);
    }

    public function store(Request $request){
       
        $this->validate($request,array(
            'ar_name'      => 'required|min:2',
        ));

        try {

            $city = new City;
            $city->ar_name = $request->ar_name;
            $city->en_name = $request->en_name;
            $city->save();


            Session::flash('success','The City has been created successfully!');

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }

    }

    public function edit($id){
        $city = City::findOrFail($id);
        $this->data['title'] = $city->ar_name;
        $this->data['city'] = $city;
        return view('admin.city.edit',$this->data);
    }

    public function update(Request $request,$id){

        $this->validate($request,array(
            'ar_name'      => 'required|min:2',
        ));

        try {
            $city =  City::findOrFail($id);
            $city->ar_name = $request->ar_name;
            $city->en_name = $request->en_name;
            $city->save();

            Session::flash('success','The City has been updated successfully!');

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        City::destroy($id);
        Session::flash('success','The City has been deleted successfully!');
        return response()->json(['delete'=>true]);
    }
}
