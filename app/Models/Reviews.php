<?php
// @mido

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';
    public $timestamps = false;

    public function reviewer(){
        return $this->belongsTo(\App\User::class,'reviews_id','id');
    }


    public function user(){
        return $this->belongsTo(\App\User::class,'user_id','id');
    }


}

