<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $table = "documentations";
    protected $guarded = [];
    
     public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
