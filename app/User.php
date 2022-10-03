<?php

namespace App;

use App\Models\Documentation;
use App\Models\PaymentInfo;
use App\Models\Message;
use App\Models\Rate;
use App\Models\City;
use App\Models\Reports;
use App\Models\Reviews;
use App\Models\WalletLog;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $appends = ['rate_avg','first_name','full_name'];
    protected $with = ['reviewers', 'documentation'];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rates(){
       return $this->hasMany(Rate::class,'model_id','id')->where('model','user');
    }


    public function reviewers(){
        return $this->hasMany(Reviews::class,'user_id','id');
    }

    public function walletLogs(){
        return $this->hasMany(WalletLog::class,'user_id','id');
    }
    
    
    public function getRateAvgAttribute(){
        return number_format($this->hasMany(Reviews::class,'user_id','id')->avg('star_user'),2);
    }

    

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function documentation(){
        return $this->hasOne(Documentation::class,'user_id','id');
    }

    public function paymentInformation(){
        return $this->hasOne(PaymentInfo::class,'user_id','id');
    }
    
    public function paymentInfo(){
        return $this->paymentInformation()->get();
    }


    public function getFirstNameAttribute(){
        return $this->name;
    }
    
    public function getFullNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }


        
    public function products() {
        return $this->hasMany(Models\Product::class)->where('is_active',1);
    }

    public function owner(){
        return $this->hasMany(Models\Order::class,'owner_id','id');
    }

    
    public function orders() {
        return $this->hasMany(Models\Order::class);
    }


    public function submittedOrders() {
        return $this->hasMany(Models\SubmittedOrder::class);
    }
    
    public function city() {
        return $this->hasOne(City::class,'id','city_id');
    }
    
         

    public function reports() {
        return $this->hasMany(Reports::class);
    }



      
    public function balance($user_id=null){
        //->where('approved',1)
        // return $this->id;
        $user_id = ($user_id) ?: $this->id;
        $wallet_logs = WalletLog::where('user_id',$user_id)->where('approved',1)->get();
        $total = 0;
        foreach($wallet_logs as $wallet_log){
            if($wallet_log->type == 'withdrawal' || $wallet_log->type == 'refunds' || $wallet_log->type == 'payed_order' ||  $wallet_log->type == 'debts'){
                $total = $total - $wallet_log->amount;
            }else{
                $total = $total + $wallet_log->amount;  
            }
            
        }
        return $total;
    }

}
