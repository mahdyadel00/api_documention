<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model{
    protected $with = ['order','product','delivery_type_obj'];
    protected $appends = ['duration','no_days'];
    protected $table = "order_products";

    public function order(){
        return $this->hasOne(\App\Models\Order::class,'id','order_id');
    }

    public function product(){
        return $this->hasOne(\App\Models\Product::class,'id','product_id');
    }
    
     public function delivery_type_obj(){
        return $this->hasOne(DeliveryType::class,'id','delivery_type');
    }
    
    public function getNoDaysAttribute(){
        $from_date = \Carbon\Carbon::parse($this->from_date);
        $to_date = \Carbon\Carbon::parse($this->to_date);
        $days =  $from_date->diffInDays($to_date, false);
        return ($days == 0) ? 1 : $days;
    }
    
    public function getDurationAttribute(){
        if($this->from_date != "" && $this->to_date != ""){
            $start_time = \Carbon\Carbon::parse($this->from_date);
            $finish_time = \Carbon\Carbon::parse($this->to_date);
            $result = $start_time->diff($finish_time);
                    //->format('%d %H:%i');
            return $result;
        }
        return 0;
    }

}
