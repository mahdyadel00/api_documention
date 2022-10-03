<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Product;
use Image;
use Auth;
use Session;

class AdvertisementController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Advertisements";
        $this->data['advertisements'] = Advertisement::orderBy('id', 'DESC')->paginate(10);

        return view('admin.advertisement.index', $this->data);
    }

    public function add()
    {
        $this->data['title'] = "Add New Advertisement";
        $this->data['allow_ckeditor'] = true;
        $this->data['products'] = Product::latest()->where('is_deleted', 0)->where('is_active', 1)->where('is_blocked', 0)->get();

        // dd( $this->data['products']);
        return view('admin.advertisement.add', $this->data);
    }

    public function store(Request $request)
    {

        $this->validate($request, array(
            'en_title'      => 'required|min:3',
            // 'product_id'      => 'required',
            'image'   => 'required|mimes:jpeg,png,jpg'
        ));

        // dd($request->all());

        try {

            $advertisement = new Advertisement;
            $advertisement->en_title = $request->en_title;
            $advertisement->en_description = $request->en_description;
            $advertisement->ar_description = $request->ar_description;
            $advertisement->link = $request->link;
            $advertisement->product_id = $request->product_id;
            $advertisement->is_active = ($request->is_active) ? $request->is_active : 0;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . rand(1000, 9999) . '.' . $extension;

                $ImageUpload = Image::make($image);
                $originalPath = public_path('uploads');
                //   dd($originalPath);
                $ImageUpload->save($originalPath . "/" . $imageName);

                // for save thumnail image
                $thumbnailPath = public_path('thumbs');
                $ImageUpload->resize(250, 125);
                $ImageUpload = $ImageUpload->save($thumbnailPath . "/" . $imageName);

                $advertisement->image = $imageName;
            }
            $advertisement->save();


            Session::flash('success', 'Advertisement has been created successfully!');
            return redirect()->route('admin.advertisement');
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return back();
        }
    }

    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $this->data['title'] = $advertisement->en_title;
        $this->data['advertisement'] = $advertisement;
        $this->data['allow_ckeditor'] = true;
        $this->data['products'] = Product::latest()->where('is_deleted', 0)->where('is_active', 1)->where('is_blocked', 0)->get();
        return view('admin.advertisement.edit', $this->data);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, array(
            'en_title'      => 'required|min:3',
            // 'product_id'      => 'required',
            'image'   => 'mimes:jpeg,png,jpg'
        ));

        try {

            $advertisement =  Advertisement::findOrFail($id);
            $advertisement->en_title = $request->en_title;
            $advertisement->en_description = $request->en_description;
            $advertisement->ar_description = $request->ar_description;
            $advertisement->link = $request->link;
            $advertisement->product_id = $request->product_id;
            $advertisement->is_active = ($request->is_active) ? $request->is_active : 0;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . rand(1000, 9999) . '.' . $extension;

                $ImageUpload = Image::make($image);
                $originalPath = public_path('uploads');
                //   dd($originalPath);
                $ImageUpload->save($originalPath . "/" . $imageName);

                // for save thumnail image
                $thumbnailPath = public_path('thumbs');
                $ImageUpload->resize(250, 125);
                $ImageUpload = $ImageUpload->save($thumbnailPath . "/" . $imageName);

                $advertisement->image = $imageName;
            }

            $advertisement->save();


            Session::flash('success', 'Advertisement has been updated successfully!');

            return redirect()->route('admin.advertisement');
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        Advertisement::destroy($id);
        Session::flash('success', 'Advertisement has been deleted successfully!');
        return response()->json(['delete' => true]);
    }
}
