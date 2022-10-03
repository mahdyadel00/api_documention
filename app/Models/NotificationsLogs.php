<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationsLogs extends Model{
    
    protected $table = "notifications_logs";
    
     public function user(){
        return $this->belongsTo(\App\User::class);
    }
}
