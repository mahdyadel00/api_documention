<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model{
    protected $table = "payment_logs";
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
}