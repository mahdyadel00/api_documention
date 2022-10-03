<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use Auth;
use Session;

class CategoryController extends BackendController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = "Categories";
        $this->data['categories'] = Category::where('parent_id',0)->orderBy('id','ASC')->paginate(10);
        return view('admin.category.index',$this->data);
    }

    public function add(){
        $this->data['title'] = "Add New Category";
        return view('admin.category.add',$this->data);
    }

    public function store(Request $request){
        $this->validate($request,array(
            'en_name'      => 'required|unique:categories|min:3',
            'image'   => 'required|mimes:jpeg,png,jpg'
        ));

        try {

            $category = new Category;
            $category->en_name = $request->en_name;
            $category->ar_name = $request->ar_name;
            $category->user_id = Auth::guard('admin')->user()->id;

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

                $category->image = $imageName;


            }
            $category->save();


            Session::flash('success','The Category has been created successfully!');

            return redirect()->route('admin.categories');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }

    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $this->data['title'] = $category->en_name;
        $this->data['category'] = $category;
        return view('admin.category.edit',$this->data);
    }

    public function update(Request $request,$id){

        $this->validate($request,array(
            'en_name'      => 'required|min:3',
            //'image'   => 'mimes:jpeg,png,jpg'
        ));

        try {

            $category =  Category::findOrFail($id);
            $category->en_name = $request->en_name;
            $category->ar_name = $request->ar_name;
            $category->user_id = Auth::guard('admin')->user()->id;

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

                $category->image = $imageName;


            }
            $category->save();


            Session::flash('success','The Category has been updated successfully!');

            return redirect()->route('admin.categories');
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        Category::destroy($id);
        Session::flash('success','The Category has been deleted successfully!');
        return response()->json(['delete'=>true]);
    }
}
