<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Page;
use Image;
use Auth;
use Session;

class PageController extends BackendController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

    }

    public function add(){
        $this->data['title'] = "Add New Page";
        $this->data['allow_ckeditor'] = true;
        return view('admin.page.add',$this->data);
    }

    public function store(Request $request){

        $this->validate($request,array(
            'en_title'      => 'required|min:3',
        ));

        try {

            $page = new Page;
            $page->en_title = $request->en_title;
            $page->ar_title = $request->ar_title;
            $page->en_description = $request->en_description;
            $page->ar_description = $request->ar_description;
            $page->save();


            Session::flash('success','The Page has been created successfully!');

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }

    }

    public function edit($id){
        $page = Page::findOrFail($id);
        $this->data['title'] = $page->en_title;
        $this->data['page'] = $page;
        $this->data['allow_ckeditor'] = true;
        return view('admin.page.edit',$this->data);
    }

    public function update(Request $request,$id){

        $this->validate($request,array(
            'en_title'      => 'required|min:3',
        ));

        try {

            $page =  Page::findOrFail($id);
            $page->en_title = $request->en_title;
            $page->ar_title = $request->ar_title;
            $page->en_description = $request->en_description;
            $page->ar_description = $request->ar_description;


            $page->save();


            Session::flash('success','The Page has been updated successfully!');

            return redirect()->back();
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        Page::destroy($id);
        Session::flash('success','The Page has been deleted successfully!');
        return response()->json(['delete'=>true]);
    }
}
