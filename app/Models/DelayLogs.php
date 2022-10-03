<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DelayLogs extends Model
{       
    protected $with = ['user'];
    protected $table = "delay_logs";
    
    public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
