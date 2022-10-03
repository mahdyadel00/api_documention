<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";
    // mo2men@submitted
    protected $fillable = ["message","order_id","to",'additions','readed', 'product_id', 'submitted_order_id'];
    // endEdit@submitted
    protected $appends = ['image','file','voice','ago','location'];
    
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    // mo2men@submitted
    public function submitted(){
        return $this->belongsTo(SubmittedOrder::class, 'submitted_order_id', 'id');
    }
    // endEdit@submitted


    public function getImageAttribute(){
        if(!empty($this->additions)){
            $additions = json_decode($this->additions);
            if(property_exists($additions, 'image') && $additions->image){
                return asset("uploads/".$additions->image);
            }
        }
        return null;
    }

    public function getFileAttribute(){
        if(!empty($this->additions)){
            $additions = json_decode($this->additions);
            if(property_exists($additions, 'file') && $additions->file){
                return asset("uploads/files/".$additions->file);
            }
        }
        return null;
    }
    
     public function getVoiceAttribute(){
        if(!empty($this->additions)){
            $additions = json_decode($this->additions);
            if(property_exists($additions, 'voice') && $additions->voice){
                return asset("uploads/voices/".$additions->voice);
            }
        }
        return null;
    }
    
    public function getLocationAttribute(){
        if(!empty($this->additions)){
            $additions = json_decode($this->additions);
            if(property_exists($additions, 'latitude') && $additions->latitude && property_exists($additions, 'longitude')  && $additions->longitude ){
                $location = new \stdClass;
                $location->latitude = $additions->latitude;
                $location->longitude = $additions->longitude;
                return $location;
            }
        }
        return null;
    }


    public function getAgoAttribute(){
        return $this->created_at->diffForHumans()." | ".$this->created_at->format('H:i , M d, Y');
    }
    
    
}
