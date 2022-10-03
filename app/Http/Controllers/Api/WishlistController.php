<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Wishlist;

use Auth;


class WishlistController extends ApiController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['wishlist'] = Wishlist::with(['products.photos', 'products.city'])->with(array('products' => function($q){
            $q->where('is_deleted', 0);
            $q->where('is_active', 1);
            $q->where('is_blocked', 0);
            // $q->whereNotNull('ar_title');
        }))->where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
        return response($this->data);
    }

    public function store(Request $request){
        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $wishlist_count = Wishlist::where('product_id',$request->product_id)->where('user_id',Auth::user()->id)->count();

        if($wishlist_count  == 0){
            $wishlist = new Wishlist;
            $wishlist->product_id = $request->product_id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();

            $response = [
                'status' => true,
                'message' => "The product has been added to Wishlist successfully!"
            ];
            return response()->json($response, 200);
        }else{
            $response = [
                'status' => true,
                'message' => "This product is already added to the Wish list !"
            ];
            return response()->json($response, 200);
        }

    }


    public function delete(Request $request){

        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
        ]);
        try {
            $wishlist = Wishlist::where('product_id',$request->product_id)->where('user_id',Auth::user()->id)->firstOrFail();
            $wishlist->delete();
            $response = [
                'status' => true,
                'message' => "The Product has been Deleted from Wish list successfully!"
            ];
            return response()->json($response, 200);
        }catch (ModelNotFoundException $exception){
            return response()->json(['status' => false,'message' => "The item Not Found"], 500);
        }
    }


}
