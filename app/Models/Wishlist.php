<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model{
    //protected $table = "wishlists";
    protected $with=['products'];

    public function products(){
        return $this->hasMany(\App\Models\Product::class,'id','product_id');
    }

}
