<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = "payment_information";
    protected $guarded = [];
    
     public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
