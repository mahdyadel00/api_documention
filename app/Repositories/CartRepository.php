<?php
namespace App\Repositories;

use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Models\Cart;

class CartRepository implements CartRepositoryInterface{

    public function getCart($user){
        $carts = Cart::where('user_id', $user->id)->get();
        $cart_count = Cart::where('user_id',$user->id)->sum('quantity');
        $lang = "en";

        $total = 0;
        foreach ($carts as $k=>$cart) {
			
			
            $product = $cart->product;
            $product_url = vendor_url('product/'.$product->id.'/'.str_slug($product->{$lang.'_title'} ));
            $carts[$k]->product->url = $product_url;
            $carts[$k]->product->isFavorite = ($product->wishlist()->where('user_id',$user->id)->first()) ? true : false;
            $carts[$k]->total_item_price = $cart->quantity * $cart->product->price;
            $total += ($cart->quantity * $cart->product->price);
        }


        $data = [
            'items' => $carts,
            'count' => $cart_count,
            'total_price' => $total
        ];
        return (object) $data;
    }

    public function addToCart($user, $product_id, $quantity){

        $cart_exist = Cart::where('product_id',$product_id)->where('user_id', $user->id);
        $status = 0;
        if($cart_exist->count() == 1) {
            $cart = $cart_exist->first();
            $cart->quantity += $quantity;
            $status = $cart->save();
        }else{
            $cart = new Cart;
            $cart->product_id = $product_id;
            $cart->quantity = $quantity;
            $cart->user_id = $user->id;
            $cart->vendor_id = $user->vendor_id;
            $status = $cart->save();
        }
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }

    public function updateQunatity($cart_id,$quantity){
         $cart = Cart::find($cart_id);
         $cart->quantity = $quantity;
         return $cart->save();
    }

    public function deleteItem($cart_id){
        $cart = Cart::find($cart_id);
        if($cart){
            $status = Cart::destroy($cart_id);
        }else{
            $status = false;
        }
        $data = [
            'status' => $status
        ];
        return $data;
    }


}
