<?php

namespace App\Repositories;

use App\Models\NotificationsLogs;
use App\Repositories\NotificationRepository;
use App\Repositories\FcmRepository;
use App\Events\UnReadMessages;
use App\Events\ChangeStatus;
use App\Mail\Order\Rented;
use App\Mail\Order\Owner;
use Mail;


class SubmittedOrderRepository
{

    public function __construct(FcmRepository $fcmRepo, NotificationRepository $notifyRepo)
    {
        $this->fcmRepo = $fcmRepo;
        $this->notifyRepo = $notifyRepo;
    }



    public function broadcast_notification_offer_submitted_order($offer)
    {
        //send fcm to owner owner
        $submitted_order = $offer->submitted_order;
        $owner_id = $offer->submitted_order->user_id;

        $title = $submitted_order->ar_title;
        $body = "عرض جديد من: " . $offer->user->name;


        $fcm_request_owner = new \stdClass;
        $fcm_request_owner->title = $title;
        $fcm_request_owner->body = $body;
        $fcm_request_owner->user_id = $owner_id;
        $fcm_request_owner->data = [
            'submitted_order_id' => $submitted_order->id
        ];

        $is_send = $this->fcmRepo->run($fcm_request_owner);
        if ($is_send) {
            $notification_owner = new NotificationsLogs;
            $notification_owner->user_id = $owner_id;
            $notification_owner->title = $title;
            $notification_owner->body = $body;
            $notification_owner->type = "submitted_order";
            $notification_owner->model_id = $submitted_order->id;
            $notification_owner->save();
        }
        // var_dump($notification_owner);
        // exit;

        // $counts = $this->notifyRepo->countUnReaded($owner_id);


        //Broadcast status

        // $content = $title . "<br />" . $body;

        Mail::send([], [], function ($message) use ($title, $submitted_order, $body) {
            $subject = $title;
            // $message->to('momen.elsyd@gmail.com')->subject($subject);
            $message->to($submitted_order->user->email)->subject($subject)->setBody($body, 'text/html');
        });

        // var_dump($title);
        // var_dump($body);
        // exit;

        // @Mail::to($submitted_order->user->email, "Ejarly : Submitted Order " . $submitted_order->ar_title)->send(new Rented($order));
    }
}
