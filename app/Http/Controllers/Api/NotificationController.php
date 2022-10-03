<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\NotificationsLogs;
use App\Models\Order;
use App\Models\SubmittedOrder;

class NotificationController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $unread_notifications = NotificationsLogs::with('user')->where('is_read', 0)->where('user_id', auth()->user()->id)->count();
        $notifications = NotificationsLogs::with('user')->where('user_id', auth()->user()->id)->latest()->paginate(10);
        foreach ($notifications as $k => $notification) {
            if ($notification->type == 'order') {
                $notifications[$k]->order = Order::where('id', $notification->model_id)->first();
            }

            if ($notification->type == 'submitted_order') {
                // dd($notification->model_id);
                $submittedOrder = SubmittedOrder::where('id', $notification->model_id)->with(['user', 'job', 'offers', 'offers.product', 'offers.product.city', 'offers.product.photos', 'city'])->first();
                // return $submittedOrder;
                $submittedOrder['submitted_order_categories'] = $submittedOrder->getMainCategoriesAttribute();
                $notifications[$k]->submittedOrder = $submittedOrder;
            }

        }
        return [
            'unread_notifications' => $unread_notifications,
            'notifications' => $notifications
        ];
    }

    public function details($id)
    {
        return NotificationsLogs::findOrFail($id);
    }

    public function read($id)
    {
        $notification = NotificationsLogs::findOrFail($id);
        $notification->is_read = 1;
        $notification->save();
        return ['status' => true];
    }
}
