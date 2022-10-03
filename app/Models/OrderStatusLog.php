<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusLog extends Model{
    protected $table = "order_status_logs";
    protected $with = ['status'];
   
    public function status(){
        return $this->belongsTo(OrderStatus::class);
    }
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
      public function order(){
        return $this->belongsTo(Order::class);
    }
}
