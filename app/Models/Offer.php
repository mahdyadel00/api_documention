<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model{
    protected $table = "offers";
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function submitted_order(){
        return $this->belongsTo(SubmittedOrder ::class);
    }
  
}
    