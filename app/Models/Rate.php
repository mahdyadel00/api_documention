<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['stars','comment','user_id','model','model_id'];
    protected $table = "rates";
}
