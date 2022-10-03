<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmittedOrder extends Model{
    protected $table = "submitted_orders";
    protected $appends = ['main_categories','photos','duration','delivery_type_values','count_offers', 'main_photo'];

    public function getMainCategoriesAttribute(){
        if($this->categories != ""){
            return Category::whereIn('id',json_decode($this->categories))->get();
        }
    }

  
    
    public function getPhotosAttribute(){
        if($this->images !=""){
            return json_decode(($this->images));
        }
        return [];
    }

    public function getMainPhotoAttribute()
    {
        if($this->images !=""){
            return json_decode(($this->images))[0];
        }
    }

    
    public function getDurationAttribute(){
        if($this->date_from != "" && $this->date_to != ""){
            $start_time = \Carbon\Carbon::parse($this->date_from);
            $finish_time = \Carbon\Carbon::parse($this->date_to);
            $result = $start_time->diffInDays($finish_time, false);
            return $result;
        }
        return 0;
    }
    
     public function user(){
        return $this->belongsTo(\App\User::class);
    }


    public function city(){
        return $this->belongsTo(\App\Models\City::class);
    }
    
    
    public function job(){
        return $this->hasOne(\App\Models\Job::class,'id','job_id');
    }

     public function getDeliveryTypesAttribute($value){
        return json_decode($value, true);
    }
    
     public function getDeliveryTypeStatusAttribute(){
         $delivery_type = DeliveryType::where('id',$this->delivery_type)->first();
        return ($delivery_type) ? $delivery_type : null;
    }
    
   

    public function getDeliveryTypeValuesAttribute(){
	if($this->delivery_types){
                return DeliveryType::whereIn('id',$this->delivery_types)->get();
	}
        
    }
    
     public function offers(){
        return $this->hasMany(Offer::class);
    }
    
     public function getCountOffersAttribute(){
        return $this->offers()->count();
    }


    public function messages(){
        return $this->hasMany(Message::class,'submitted_order_id','id');
    }
    
}
