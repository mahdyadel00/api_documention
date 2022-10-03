<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = "products";
    protected $appends = ['main_categories', 'delivery_type_values', 'main_photo'];
    protected $with = ['status_val', 'job', 'user'];

    public function setCategoriesAttribute($value)
    {
        $this->attributes['categories'] = ($value);
    }

    public function getCategoriesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getMainCategoriesAttribute()
    {
        return Category::whereIn('id', $this->categories)->get();
    }


 

    //    public function setDeliveryTypesAttribute(){
    //        return json_encode($this->delivery_types, true);
    //    }

    public function getDeliveryTypesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function getDeliveryTypeStatusAttribute()
    {
        $delivery_type = DeliveryType::where('id', $this->delivery_type)->first();
        return ($delivery_type) ? $delivery_type : null;
    }



    public function getDeliveryTypeValuesAttribute()
    {
        if ($this->delivery_types) {
            return DeliveryType::whereIn('id', $this->delivery_types)->get();
        }
    }

    public static function getByDistance($lat, $lng, $distance)
    {
        $results = DB::select(DB::raw('SELECT id, ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians(latitude) ) ) ) AS distance FROM products HAVING distance < ' . $distance . ' ORDER BY distance'));
        return $results;
    }

    public function wishlist()
    {
        return $this->hasOne(\App\Models\Wishlist::class, 'product_id', 'id');
    }

    public function status_val()
    {
        return $this->hasOne(\App\Models\Status::class, 'id', 'status');
    }

    public function job()
    {
        return $this->hasOne(\App\Models\Job::class, 'id', 'job_id');
    }

    public function city()
    {
        return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
    }

    public function user()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhotos::class, 'product_id', 'id');
    }

    public function getMainPhotoAttribute()
    {
        $photo = $this->photos()->first();
        return ($photo) ? $photo->image : "";
    }

    public function rental_times()
    {
        return $this->hasMany(OrderProduct::class, 'product_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'product_id', 'id');
    }

    public function reviewers(){
        return $this->hasMany(Reviews::class,'product_id','id');
    }

}
