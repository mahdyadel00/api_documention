<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class WalletLog extends Model{
    protected $table = "wallet_logs";
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function from(){
        return $this->hasOne(\App\User::class,'id','from_id');
    }
   
}
