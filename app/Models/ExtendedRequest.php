<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtendedRequest extends Model{
    
    protected $with = ['user'];

    protected $table = "extended_requests";
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
     public function status(){
        return $this->hasOne(\App\Models\OrderStatus::class,'id','status_id');
    }

}
