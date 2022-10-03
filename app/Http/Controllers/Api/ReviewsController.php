<?php
// <!-- @mido -->

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\Order;

class ReviewsController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function createreview(Request $request)
    {

        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        $order = Order::find($request->order_id);

        $reviews = new Reviews;
        $reviews->star_product = $request->input('star_product');
        $reviews->reviews_product = $request->input('reviews_product');
        $reviews->star_user = $request->input('star_user');
        $reviews->reviews_user = $request->input('reviews_user');
        $reviews->reviews_id = auth()->user()->id;
        
        if ($order->user_id == auth()->user()->id) {
            $order->user_review = 1;
            $reviews->product_id = $order->products[0]->product_id;
            $reviews->user_id = $order->owner_id;
            $order->save();
        } else {
            $order->owner_review = 1;
            $reviews->user_id = $order->user_id;
            $order->save();
        }

        $reviews->save();

        return response()->json($reviews);
    }
}
// <!-- @endEdit -->