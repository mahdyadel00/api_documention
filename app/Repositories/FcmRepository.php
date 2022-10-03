<?php
namespace App\Repositories;
use App\User;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


class FcmRepository {
    
    public function run($request, $sound = 'default'){
        
        try{
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60*20);
            $notificationBuilder = new PayloadNotificationBuilder($request->title);
            $notificationBuilder->setBody($request->body)
                ->setSound($sound);
            $notificationBuilder->setIcon('ic_stat_dleel');


            $dataBuilder = new PayloadDataBuilder();
            if(isset($request->data) && is_array($request->data)){
                $dataBuilder->setData($request->data);
            }

            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();

            // You must change it to get your tokens
            $tokens = [];
           if(isset($request->user_id) && $request->user_id != ""){
               $tokens = User::where('id',$request->user_id)->whereNotNull("android_token")->pluck("android_token")->toArray();
           }else{
               //$tokens = User::whereNotNull("android_token")->pluck("android_token")->toArray();
           }        

       
            if(sizeof($tokens) === 0) {
                //return Array - you must remove all this tokens in your database
                $msg = 'عفواً لا توجد أجهزة مسجلة لإرسال إشعارات لها !';
                 $status = false;
                  return ['status'=>$status , 'message' =>$msg];
            }
            //dd($tokens);

            $downstreamResponse = \LaravelFCM\Facades\FCM::sendTo($tokens, $option, $notification, $data);
            if($downstreamResponse->numberSuccess())
            {
                $msg = 'تم إرسال الإشعارات بنجاح';
                $status = true;

            }
            elseif($downstreamResponse->numberFailure())
            {
                //session::flash('error',$downstreamResponse->numberFailure());
                $msg = $downstreamResponse->numberFailure();
                $status = false;
                //return back()->withInput(Input::all());
            }
            elseif($downstreamResponse->tokensToDelete())
            {
                //return Array - you must remove all this tokens in your database
               $msg =$downstreamResponse->tokensToDelete();
               $status = false;
            }
            elseif($downstreamResponse->tokensToModify())
            {
                //return Array (key : oldToken, value : new token - you must change the token in your database )
                $msg = $downstreamResponse->tokensToModify();
                $status = false;
                
            }
            elseif($downstreamResponse->tokensToModify())
            {
                //return Array - you should try to resend the message to the tokens in the array
               $msg = $downstreamResponse->tokensToModify();
                $status = false;
            }
            elseif($downstreamResponse->tokensToModify())
            {
                // return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
                $msg = $downstreamResponse->tokensToModify();
                 $status = false;
            }
            else
            {
                $msg = 'حدث خطأ اثناء الإشعارات';
                $status = false;
            }
        }
        catch (Exception $exception)
        {
            //dd($exception);
            $msg = 'حدث خطأ اثناء ارسال الإشعارات العامة';
             $status = false;
          //  error_log($exception);
        }
        
        return ['status'=>$status , 'message' =>$msg];

    }
    
  
    private function getUserTokens($mobileType='android'){
        $columnName = 'android_token';
        if($mobileType == 'ios') {
            $columnName = 'ios_token';
        }
        $tokens = User::whereNotNull($columnName)->pluck($columnName)->toArray();
        return (array) $tokens;
    }
}