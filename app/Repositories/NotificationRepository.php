<?php
namespace App\Repositories;


use App\Models\NotificationsLogs;

class NotificationRepository {

    public function unReaded($user_id){
       return NotificationsLogs::with('user')->where('is_read',0)->where('user_id',$user_id)->latest()->get();

    }
    
    public function countUnReaded($user_id){
       return NotificationsLogs::where('is_read',0)->where('user_id',$user_id)->count();

    }



}
