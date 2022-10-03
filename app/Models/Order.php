<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $with = ['status'];
 

    public function status(){
        return $this->hasOne(\App\Models\OrderStatus::class,'id','status_id');
    }

    public function products(){
        return $this->hasMany(\App\Models\OrderProduct::class,'order_id','id');
    }

    public function first_products(){
        return $this->hasMany(\App\Models\OrderProduct::class,'order_id','id')->without(['order','product','delivery_type_obj'])->oldest();
    }

    public function extension_status(){
        return $this->hasOne(ExtensionStatus::class,'id','extension_status_id');
    }

    public function payment_method(){
        return $this->hasOne(\App\Models\PaymentMethods::class,'id','payment_method_id');
    }
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
    public function owner(){
        return $this->belongsTo(\App\User::class,'owner_id','id');
    }
    
    public function messages(){
        return $this->hasMany(Message::class,'order_id','id');
    }
    
     public function status_logs(){
        return $this->hasMany(OrderStatusLog::class,'order_id','id');
    }
    
     public function extended_requests(){
        return $this->hasMany(ExtendedRequest::class);
    }

    public function delay_logs(){
        return $this->hasMany(DelayLogs::class);
    }
    
    
     public function payment_logs(){
        return $this->hasMany(PaymentLog::class);
    }
    
     public function wallet_logs(){
        return $this->hasMany(WalletLog::class);
    }
    
    
     public function getApplicationAmountAttribute($value){
          return round($value, 2);
     }
     
     public function getTaxAmountAttribute($value){
          return round($value, 2);
     }
     
     public function getOwnerTotalAttribute($value){
          return round($value, 2);
     }
    
    
    
    
}
