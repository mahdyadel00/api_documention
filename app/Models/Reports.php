<?php
// @midoshriks-2

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'reports';
    public $timestamps = false;

    
    
    public function user(){
        return $this->belongsTo(\App\User::class,'user_id','id');
    }

    public function report(){
        return $this->belongsTo(\App\Models\ReportStatus::class,'report_status_id','id');
    }
    
    // public function model(){
    //     return $this->belongsTo(\App\Models\Report_status::class,'model_id','id');
    // }
    

}