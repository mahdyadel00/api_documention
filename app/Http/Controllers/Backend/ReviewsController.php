<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Reviews;
use  App\USER;
use App\Models\Product;

class ReviewsController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    }

    // @Shwo all data

    public function shworeviews(Request $request)
    {
        $this->data['allReviews'] = Reviews::all();

        // test
        // $data =  Reviews::all();
        // return view('admin.products.reveiws', ['allReviews'=>$data]);

        // return Reviews::all();
        // return view('admin.product.reviews', $this->data);
        // test

        return view('admin.product.reveiws', $this->data);
    }


    // mido finsing reviews table product

    public function productReviews($product_id)
    {
        $this->data['title'] = "Reviews products";
        $this->data['productReviews'] =  $productReviews = Reviews::where('product_id', $product_id)->with('reviewer')->get();
        return view('admin.product.reviews', $this->data);
    }
    // mido finsing reviews table product

    public function userReviews($user_id)
    {
        $this->data['title'] = "Reviews Users";
        $this->data['userReviews'] = Reviews::where('user_id', $user_id)->with(['reviewer'])->get();
        return view('admin.user.reviews', $this->data);
    }
}
