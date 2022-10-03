<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistinctionStatus extends Model
{
    protected $table = "distinction_statuses";
    public $timestamps = false;
    
    
     public function product(){
        return $this->belongsTo(DistinguishProduct::class);
    }
}
