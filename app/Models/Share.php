<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = "share_list";
    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
