<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model{
    protected $table = "order_status";
    public $timestamps = false;
     protected $appends = ['key'];
     
      public function getKeyAttribute(){
        return str_replace(" ","_",  strtolower($this->en_name));
    }

}
