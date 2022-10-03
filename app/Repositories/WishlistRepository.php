<?php
namespace App\Repositories;

use App\Repositories\Interfaces\WishlistInterface;
use App\Models\Wishlist;

class WishlistRepository implements WishlistInterface {

    public function get($user){
        $wishlists = Wishlist::where('user_id', $user->id)->get();
        $lang = "en";
        foreach ($wishlists as $k=>$wishlist) {
            $product = $wishlist->product;
            $product_url = vendor_url('product/'.$product->id.'/'.str_slug($product->{$lang.'_title'} ));
            $wishlists[$k]->product->url = $product_url;
        }


        $data = [
            'items' => $wishlists,
            'count' => count($wishlists),
        ];
        return (object) $data;
    }

    public function add($user, $product_id){

        $wishlist_exist = Wishlist::where('product_id',$product_id)->where('user_id', $user->id);
        if($wishlist_exist->count() == 1) {
            $status = 0;
        }else{
            $wishlist = new Wishlist;
            $wishlist->product_id = $product_id;
            $wishlist->user_id = $user->id;
            $wishlist->vendor_id = $user->vendor_id;
            $status = $wishlist->save();
        }
        $data = [
            'status' => $status
        ];
        return response()->json($data);
    }



    public function remove($wishlist_id){
        $cart = Wishlist::find($wishlist_id);
        if($cart){
            $status = Wishlist::destroy($wishlist_id);
        }else{
            $status = false;
        }
        $data = [
            'status' => $status
        ];
        return $data;
    }


}
