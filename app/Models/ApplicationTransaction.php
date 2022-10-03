<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ApplicationTransaction extends Model{
    protected $table = "application_transactions";
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
    
   

   
}
