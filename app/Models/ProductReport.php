<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReport extends Model{
    protected $table = "product_reports";
    protected $with = ['status_value'];
    

    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function submitted(){
        return $this->belongsTo(SubmittedOrder::class, 'submitted_order_id', 'id');
    }
    
    public function status_value(){
        return $this->hasOne(ReportStatus::class,'id','report_status_id');
    }
}
