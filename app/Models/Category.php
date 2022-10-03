<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model{
    protected $table = "categories";

    public function products(){
        return Product::all()->filter(function($product) {
                return in_array($this->id, $product->categories) ? $product : null;
        });
    }
}
