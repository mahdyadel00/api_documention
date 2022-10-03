<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\WalletLog;
use App\Models\NotificationsLogs;
use App\Repositories\NotificationRepository;
use App\Repositories\FcmRepository;
use App\Events\UnReadMessages;
use App\Events\ChangeStatus;
use App\Mail\Order\Rented;
use App\Mail\Order\Owner;
use App\Models\GeneralSettings;
use PDF;
use Mail;


class OrderRepository
{

    public function __construct(FcmRepository $fcmRepo, NotificationRepository $notifyRepo)
    {
        $this->fcmRepo = $fcmRepo;
        $this->notifyRepo = $notifyRepo;
    }

    public function orders($user_id, $request = null)
    {
        $orders = OrderProduct::with(['order', 'order.user', 'order.extended_requests'])->latest();

        $orders = $orders->whereHas('order', function ($query) use ($request) {
            //  $query->with(['user','extended_requests']);
        });
        if ($request->status_id) {
            if ($request->status_id == 11) {
                $orders = $orders->whereHas('order', function ($query) use ($request) {
                    $query->whereNotIn('status_id', [1, 10]);
                });
            } else {

                $orders = $orders->whereHas('order', function ($query) use ($request) {
                    $query->where('status_id', $request->status_id);
                });
            }
        }
        if ($request->is_rent && $request->is_rent == 1) {
            $statues_ids = OrderStatus::where('is_rent', 1)->pluck('id')->toArray();
            $orders = $orders->whereHas('order.status', function ($query) use ($statues_ids) {
                $query->whereIn('status_id', $statues_ids);
            });
        }

        if ($request->statuses) {
            $statuses = explode(",", $request->statuses);
            if (is_array($statuses) && $request->statuses != "") {
                $orders = $orders->whereHas('order', function ($query) use ($statuses) {
                    $query->whereIn('status_id', $statuses);
                });
            }
        }

        if ($request->rented && $request->rented == 1) {
            $orders = $orders->where('user_id', $user_id);
        }

        if ($request->leased && $request->leased == 1) {
            $orders = $orders->whereHas('product', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            });
        }



        $orders = $orders->get();

        return $orders;
    }

    public function calculat_price($request)
    {
        $price_per_day = $request->price_per_day;
        $price_per_week = $request->price_per_week;
        $price_per_month = $request->price_per_month;


        if (isset($request->duration)) {
            $days = $request->duration;
            $week = intval($days / 7);
            $month = intval($days / 30);
        } else {
            $start_time = \Carbon\Carbon::parse($request->from_date);
            $finish_time = \Carbon\Carbon::parse($request->to_date);
            $period = $start_time->diff($finish_time);

            $days = ($period->days == 0) ? 1 : $period->days;
            $week = intval($days / 7);
            $month = intval($days / 30);
        }



        if ($month != null && $month > 0 && $price_per_month > 0) {

            $diffMonth = $days - ($month * 30);

            $diffWeek = intval($diffMonth / 7);

            if ($diffWeek == 0 || $price_per_week == 0) {
                $diffDay = ($diffMonth > 0) ? $diffMonth : 0;
            } else {
                $diffDay = ($diffMonth > 0) ? $diffMonth - ($diffWeek * 7) : 0;
            }

            // dd($month,$diffWeek,$diffDay);
            $price = ($price_per_month * $month) + ($diffWeek * $price_per_week) + ($diffDay * $price_per_day);
        } else if ($week != null && $week > 0 && $price_per_week > 0) {

            if ($week * 7 == $days) {
                $price = ($week * $price_per_week);
            } else {
                $daysDiffWeek = $days - ($week * 7);
                $price = ($week * $price_per_week) + ($daysDiffWeek * $price_per_day);
            }
        } else {
            $price = $price_per_day * $days;
        }

        return $price * $request->quantity;
    }

    public function calculat_price2($request)
    {
        $price_per_day = $request->price_per_day;
        $price_per_week = $request->price_per_week;
        $price_per_month = $request->price_per_month;



        $start_time = \Carbon\Carbon::parse($request->from_date);
        $finish_time = \Carbon\Carbon::parse($request->to_date);
        $period = $start_time->diff($finish_time);

        $days = ($period->days == 0) ? 1 : $period->days;
        $week = intval($days / 7);
        $month = intval($days / 30);


        if ($month != null && $month > 0 && $price_per_month > 0) {

            $diffMonth = $days - ($month * 30);

            $diffWeek = intval($diffMonth / 7);

            if ($diffWeek == 0 || $price_per_week == 0) {
                $diffDay = ($diffMonth > 0) ? $diffMonth : 0;
            } else {
                $diffDay = ($diffMonth > 0) ? $diffMonth - ($diffWeek * 7) : 0;
            }

            // dd($month,$diffWeek,$diffDay);
            $price = ($price_per_month * $month) + ($diffWeek * $price_per_week) + ($diffDay * $price_per_day);
        } else if ($week != null && $week > 0 && $price_per_week > 0) {

            if ($week * 7 == $days) {
                $price = ($week * $price_per_week);
            } else {
                $daysDiffWeek = $days - ($week * 7);
                $price = ($week * $price_per_week) + ($daysDiffWeek * $price_per_day);
            }
        } else {
            $price = $price_per_day * $days;
        }

        $data = [

            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'days' => $days,
            'price_per_day' => $price_per_day,
            'price_per_week' => $price_per_week,
            'price_per_month' => $price_per_month,
            'quantity' => $request->quantity,
            'total' => $price * $request->quantity,
        ];

        return $data;
    }

    public function export_pdf($order)
    {

        $data['order'] = $order;
        $data['title'] = "Invoice #" . $order->id . " - Ejarly";

        $pdf = PDF::loadHTML(view('admin.orders.order_tpl', $data)->render());

        $pdf_name = "Order#" . $order->id . "-ejarly" . ".pdf";
        return $pdf->download($pdf_name, array('Attachment' => 0));
    }


    public function export_extended_order_pdf($extended_order)
    {

        $data['extended_order'] = $extended_order;
        $data['order'] = $order = Order::find($extended_order->order_id);
        $data['title'] = "Invoice #" . $order->id . " - Ejarly";

        $pdf = PDF::loadHTML(view('admin.orders.extended_order_tpl', $data)->render());

        $pdf_name = "Order#" . $order->id . "-ejarly" . ".pdf";
        return $pdf->download($pdf_name, array('Attachment' => 0));
    }


    public function remove_product_from_order($order_id, $product_id)
    {


        $order = Order::findOrFail($order_id);
        $product = OrderProduct::where(['order_id' => $order_id, 'product_id' => $product_id])->first();


        // return $product;
        if (!$product) {
            return ['status' => false, 'message' => 'this product is not exist'];
        }


        // return ['status' => true, 'message' => 'product is removed Successfully from order'];

        $product->delete();


        $gs = GeneralSettings::first();
        $application_percentage = ($order->user->application_percentage != "") ? $order->user->application_percentage : $gs->application_percentage;
        $tax_percentage = ($order->user->tax_percentage != "") ? $order->user->tax_percentage : $gs->tax_percentage;
        $service_fees = ($order->user->service_fees && $order->user->service_fees != "") ? $order->user->service_fees : $gs->service_fees;

        $total_rent_price = 0;
        foreach ($order->products as $order_product) {
            $total_rent_price += $order_product->total;
        }

        $total_rent_price = round($total_rent_price, 2);
        $application_amount = ($application_percentage / 100) * $total_rent_price;
        $tax_amount = ($tax_percentage / 100) * $total_rent_price;
        $total_after_tax = $total_rent_price + $tax_amount;
        $total_after_service_fees_tax = $total_after_tax + $service_fees;
        $owner_total = $total_after_service_fees_tax - $application_amount - $tax_amount - $service_fees;

        $order->application_percentage = $application_percentage;
        $order->tax_percentage = $tax_percentage;
        $order->sub_total = $total_rent_price;
        $order->application_amount = $application_amount;
        $order->tax_amount = $tax_amount;
        $order->service_fees = $service_fees;
        $order->total = $total_after_service_fees_tax;
        $order->owner_total = $owner_total;


        $order->save();
        return ['status' => true, 'message' => 'product is removed Successfully from order'];
    }


    public function add_product_to_order($order_id, $product_id, $quantity)
    {


        $order = Order::findOrFail($order_id);
        $product = Product::findOrFail($product_id);
        $rent_product = $order->products[0];

        $check_exist = OrderProduct::where(['order_id' => $order_id, 'product_id' => $product_id])->count();
        if ($check_exist > 0) {
            return ['status' => false, 'message' => 'this product alreay exist before'];
        }

        $order_product = new OrderProduct;
        $order_product->user_id = $order->user_id;
        $order_product->owner_id = $product->user_id;
        $order_product->order_id = $order->id;
        $order_product->product_id = $product_id;
        $order_product->from_date = \Carbon\Carbon::parse($rent_product->from_date);
        $order_product->to_date = \Carbon\Carbon::parse($rent_product->to_date);
        $order_product->quantity = $quantity;
        $order_product->price_per_day =  ($product->price_per_day != null) ? $product->price_per_day : 0;
        $order_product->price_per_week =  ($product->price_per_week != null) ? $product->price_per_week : 0;
        $order_product->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
        if ($rent_product->delivery_type) {
            $order_product->delivery_type = $rent_product->delivery_type;
        }

        $price_request = new \stdClass();
        $price_request->from_date = $rent_product->from_date;
        $price_request->to_date = $rent_product->to_date;
        $price_request->price_per_day = ($product->price_per_day != null) ? $product->price_per_day : 0;
        $price_request->price_per_week = ($product->price_per_week != null) ? $product->price_per_week : 0;
        $price_request->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
        $price_request->quantity = $quantity;

        $order_product->total = $this->calculat_price($price_request);



        $gs = GeneralSettings::first();
        $application_percentage = ($order->user->application_percentage != "") ? $order->user->application_percentage : $gs->application_percentage;
        $tax_percentage = ($order->user->tax_percentage != "") ? $order->user->tax_percentage : $gs->tax_percentage;
        $service_fees = ($order->user->service_fees && $order->user->service_fees != "") ? $order->user->service_fees : $gs->service_fees;


        $total_rent_price = $order->sub_total + $order_product->total;

        $total_rent_price = round($total_rent_price, 2);
        $application_amount = ($application_percentage / 100) * $total_rent_price;
        // var_dump($application_amount);
        $tax_amount = ($tax_percentage / 100) * $total_rent_price;
        $total_after_tax = $total_rent_price + $tax_amount;
        $total_after_service_fees_tax = $total_after_tax + $service_fees;

        // $owner_total = $total_after_tax - $application_amount - $tax_amount;
        $owner_total = $total_after_service_fees_tax - $application_amount - $tax_amount - $service_fees;


        $order->sub_total = $total_rent_price;
        $order->application_amount = $application_amount;
        $order->tax_amount = $tax_amount;
        // $order->total = $total_after_tax;
        $order->service_fees = $service_fees;
        $order->total = $total_after_service_fees_tax;
        $order->owner_total = $owner_total;


        // $order->save();



        // var_dump($order->sub_total);
        // var_dump($order->application_amount);
        // var_dump($order->tax_amount);
        // var_dump($order->total);
        // var_dump($order->owner_total);
        // exit;
        $order_product->save();
        $order->save();
        return ['status' => true, 'message' => 'product add Successfully to order'];
    }

    public function total_wallet($user_id)
    {
        //->where('approved',1)
        $wallet_logs = WalletLog::where('user_id', $user_id)->get();
        $total = 0;
        foreach ($wallet_logs as $wallet_log) {
            if ($wallet_log->type == 'withdrawal' || $wallet_log->type == 'refunds' || $wallet_log->type == 'payed_order') {
                $total = $total - $wallet_log->amount;
            } else {
                $total = $total + $wallet_log->amount;
            }
        }
        return $total;
    }

    public function broadcast_notification_create_order($order)
    {
        //send fcm to owner owner
        $rent_product = $order->products[0]->product;
        $owner_id = $order->owner_id;

        $title = " طلب رقم #" . $order->id;
        $body = "مبروك، لديك طلب تأجير جديد";

        $fcm_request_owner = new \stdClass;
        $fcm_request_owner->title = $title;
        $fcm_request_owner->body = $body;
        $fcm_request_owner->user_id = $owner_id;
        $fcm_request_owner->data = [
            'order_id' => $order->id
        ];
        $is_send = $this->fcmRepo->run($fcm_request_owner);
        if ($is_send) {
            $notification_owner = new NotificationsLogs;
            $notification_owner->user_id = $owner_id;
            $notification_owner->title = $title;
            $notification_owner->body = $body;
            $notification_owner->type = "order";
            $notification_owner->model_id = $order->id;
            $notification_owner->save();
        }

        $counts = $this->notifyRepo->countUnReaded($owner_id);
        broadcast(new UnReadMessages($counts, $owner_id))->toOthers();



        //Broadcast status
        try {
            $counts = $this->notifyRepo->countUnReaded($order->user_id);
            broadcast(new UnReadMessages($counts, $order->user_id))->toOthers();
            broadcast(new ChangeStatus($order))->toOthers();
        } catch (Exception $e) {
            //dd($e);
        }


        //Mail::to("badr@fudex.com.sa","Ejarly : Order #".$order->id)->send(new Rented($order));
        // mido@mail
        // @Mail::to($order->user->email)->send(new Rented($order));
        @Mail::to($order->owner->email)->send(new Owner($order, $title, $body ));

        // @Mail::send([], [$order], function ($message)  use ($order) {
        //     $subject = "تعليمات عملية التاجير";
        //     $message->to($order->user->email)->subject($subject)->setBody("Ejarly $order->id", 'text/html');;
        //     $message->to($order->owner->email)->subject($subject)->setBody("Ejarly $order->id", 'text/html');;
        // });

    }

    public function broadcast_notification_change_status($order)
    {
        //send fcm to owner owner
        if ($order->status_id == 2 || $order->status_id == 13) {
            switch ($order->status_id) {
                case 2:
                    $body = "لقد وافقت على الطلب ، قم بالتواصل مع المستأجر لتحديد مكان وموعد الالتقاء ";
                    break;
                case 13:
                    $body = "لديك طلب تمديد جديد";
                    break;

                default:
                    $body = "Status changed to " . $order->status->en_name;
                    break;
            }
            $owner_id = $order->owner_id;
            // return $owner_id;
            $title = " طلب رقم #" . $order->id;
            $fcm_request_owner = new \stdClass;
            $fcm_request_owner->title = $title;
            $fcm_request_owner->body = $body;
            $fcm_request_owner->user_id = $owner_id;
            $fcm_request_owner->data = [
                'order_id' => $order->id
            ];

            $is_send = $this->fcmRepo->run($fcm_request_owner);
            if ($is_send) {
                $notification_owner = new NotificationsLogs;
                $notification_owner->user_id = $owner_id;
                $notification_owner->title = $title;
                $notification_owner->body = $body;
                $notification_owner->type = "order";
                $notification_owner->model_id = $order->id;
                $notification_owner->save();
            }

            $counts = $this->notifyRepo->countUnReaded($owner_id);
            broadcast(new UnReadMessages($counts, $owner_id))->toOthers();
            // dd($order->owner->email);

            @Mail::to($order->owner->email)->send(new Owner($order, $title, $body ));
            
            // $content = $title . "<br />" . $body;
            // Mail::send('email.template', ['content' => $content], function ($message) use ($title, $order) {
            //     $subject = $title;
            //     $message->to($order->owner->email)->subject($subject);
            // });
        }

        if (
            $order->status_id == 12 || $order->status_id == 2 || $order->status_id == 8   ||
            $order->status_id == 10  ||
            $order->extension_status_id == 3 ||
            $order->extension_status_id == 4 ||
            $order->extension_status_id == 5
        ) {
            switch ($order->status_id) {
                case "2":
                    $body = " تمت الموافقة على طلبك لكل من المنتجات ";
                    foreach ($order->products as $key => $value) {
                        $body .= $value->product->ar_title . ". ";
                    }
                    break;
                case "10":
                    $body = " تم تأكيد استرجاع المنتج";
                    break;
                case "12":
                    $body = " تم الغاء طلبك من قبل صاحب المنتج ";
                    break;

                default:
                    $body = "Status changed to " . $order->status->en_name;
                    break;
            }

            if (($order->status_id == 8 && $order->extension_status_id == 1)) {
                $body = "تم تأكيد استلامك للمنتج,بدأت عملية التأجير، أستمتع";
            }elseif($order->status_id == 10){
                $body = "تم إسترجاع المنتج بنجاح";
            } else {
                switch ($order->extension_status_id) {
                    case 3:
                        $body = "تمت الموافقة على طلب التمديد";
                        break;
                    case 4:
                        $body = "تم الغاء طلب التمديد من قبل صاحب المنتج ";
                        break;
                    case 5:
                        $body = "تمت الموافقة مبدئيا على طلب التمديد قم بتسديد مبلغ التمديد لإكمال الموافقة";
                        break;
                        // default:
                        // $body = "تم تأكيد استلامك للمنتج,بدأت عملية التأجير، أستمتع";
                        // break;
                }
            }
            //send fcm to owner renter
            $title = " طلب رقم #" . $order->id;
            // $body = "Status changed to " . $order->status->en_name;
            $fcm_request = new \stdClass;
            $fcm_request->title = $title;
            $fcm_request->body = $body;
            $fcm_request->user_id = $order->user_id;
            $fcm_request->data = [
                'order_id' => $order->id
            ];
            $is_send = $this->fcmRepo->run($fcm_request);
            if ($is_send) {
                $notification = new NotificationsLogs;
                $notification->user_id = $order->user_id;
                $notification->title = $title;
                $notification->body = $body;
                $notification->type = "order";
                $notification->model_id = $order->id;
                $notification->save();
            }

            // $content = $title . "<br />" . $body;
            // Mail::send('email.template', ['content' => $content], function ($message) use ($title, $order) {
            //     $subject = $title;
            //     $message->to($order->user->email)->subject($subject);
            // });
            @Mail::to($order->user->email)->send(new Rented($order, $title, $body ));

        }
        //Broadcast status
        try {
            $counts = $this->notifyRepo->countUnReaded($order->user_id);
            broadcast(new UnReadMessages($counts, $order->user_id))->toOthers();
            broadcast(new ChangeStatus($order))->toOthers();
        } catch (Exception $e) {
            //dd($e);
        }
    }
}
