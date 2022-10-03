<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistinguishProduct extends Model
{
    protected $table = "distinguish_products";
    protected $append = ['selected'];

    public function getSelectedAttribute($value)
    {
        return json_decode($value, true);
    }

    public function status(){
        return $this->hasOne(DistinctionStatus::class,'id','distinction_status_id');
    }
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
     public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
