<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\GeneralSettings;
use App\User;
use App\Models\Product;
use App\Models\DelayLogs;
use App\Repositories\OrderRepository;
use App\Models\OrderStatusLog;
use App\Models\NotificationsLogs;
use App\Repositories\FcmRepository;
use App\Repositories\NotificationRepository;
use Mail;

class EndService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'end:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check if the rent is ended or not';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OrderRepository $orderRepo, FcmRepository $fcmRepo, NotificationRepository $notifyRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->fcmRepo = $fcmRepo;
        $this->notifyRepo = $notifyRepo;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // Mail::send([], [], function ($message) {
        //     $subject = "online عملية التاجير";
        //     $message->to('momen.elsyd@gmail.com')->subject($subject)->setBody("Ejarly test", 'text/html');
        //     // $message->to($order->owner->email)->subject($subject)->setBody("Ejarly $order->id", 'text/html');;
        // });
        // dd('test');

        // return 
        $max_amount = GeneralSettings::first()->max_amount;
        $users = User::where('recover', '>', $max_amount)->get();
        // dd($users);
        foreach ($users as $k => $u) {
            // var_dump($u . '<br>'); 
            $title = "طلب تسديد مستحقات";
            $body = "مرحبا، لقد تخطيت الحد السعري لمستحقات التطبيق يرجئ السداد تجنباً للإيقاف الحساب";

            $fcm_request = new \stdClass;
            $fcm_request->title = $title;
            $fcm_request->body = $body;
            $fcm_request->user_id = $u->id;
            $is_send = $this->fcmRepo->run($fcm_request);
            if ($is_send) {
                $notification = new NotificationsLogs;
                $notification->user_id = $u->id;
                $notification->title = $title;
                $notification->body = $body;
                $notification->type = "notify";
                // $notification->model_id = $order->id;
                $notification->save();
            }
        }


        $nowDate  = strtotime(date("Y-m-d H:i:s") . "+6 hours");
        $endServices = Order::with(['first_products', 'user'])->whereHas("products", function ($q) use ($nowDate) {
            $q->where('to_date', '<=', date('Y-m-d H:i:s', $nowDate));
        })->where('status_id', '8')->get();

        // dd(date('Y-m-d H:i:s', $nowDate));
        // dd($endServices);

        $nowDate  = strtotime(date("Y-m-d H:i:s") . "+3 hours");
        // dd(date('Y-m-d H:i:s', $nowDate));

        foreach ($endServices as $end => $service) {
            $to_date = strtotime($service->first_products[0]->to_date);
            echo  $service->id  . '<br>';
            // echo date("Y-m-d H:i:s", $nowDate);
            // $nowDate  = strtotime(date("Y-m-d H:i:s") . "+3 hours");
            echo date("Y-m-d H:i:s", $nowDate) . '<br>';
            // return false;
            $dateTenDaysAfter  = strtotime($service->first_products[0]->to_date . ' +10 days');
            $dateThreeDaysAfter  = strtotime($service->first_products[0]->to_date . "+3 days");
            $dateThreeHoursAfter = strtotime($service->first_products[0]->to_date . "+3 hours");
            $dateThreeHoursBefor = strtotime($service->first_products[0]->to_date . "-3 hours");

            echo  $service->first_products[0]->to_date . ' | ' . date("Y-m-d H:i:s", $dateTenDaysAfter) . '<br>';
            echo  $service->first_products[0]->to_date . ' | ' . date("Y-m-d H:i:s", $dateThreeDaysAfter) . '<br>';
            echo  $service->first_products[0]->to_date . ' | ' . date("Y-m-d H:i:s", $dateThreeHoursAfter) . '<br>';
            echo  $service->first_products[0]->to_date . ' | ' . date("Y-m-d H:i:s", $dateThreeHoursBefor) . '<br>';


            if ($service->sent_at) {
                $dateOneDaysAfter  = strtotime($service->sent_at . ' +1 days');
            }

            if ($nowDate >= $dateTenDaysAfter) {
                echo   $service->first_products[0]->id . ' ' . "more than 10d" . " end <br/>";
                if (isset($dateOneDaysAfter)) {
                    echo date("Y-m-d H:i:s", $dateOneDaysAfter) . '<br>';
                    if (($nowDate >= $dateOneDaysAfter || $service->count_sent == 0) && $service->count_sent >= 10) {
                        // send Mail here later
                        echo date("Y-m-d H:i:s", $dateOneDaysAfter) . '<br>';
                        var_dump($this->extend_order_action($service, 4, date("Y-m-d H:i:s", $nowDate)));
                        // $service->count_sent++;
                        // $service->sent_at = date("Y-m-d H:i:s", $nowDate);
                        // $service->save();
                    };
                }
            } else if ($nowDate >= $dateThreeDaysAfter) {
                echo $service->first_products[0]->id . ' ' .  "more than 3d" . " end <br/>";
                if (isset($dateOneDaysAfter)) {
                    echo date("Y-m-d H:i:s", $dateOneDaysAfter) . '<br>';
                    if (($nowDate >= $dateOneDaysAfter || $service->count_sent == 0) && $service->count_sent < 10) {
                        // send Mail here later
                        echo date("Y-m-d H:i:s", $dateOneDaysAfter) . '<br>';
                        var_dump($this->extend_order_action($service, 2, date("Y-m-d H:i:s", $nowDate)));
                        // $service->count_sent++;
                        // $service->sent_at = date("Y-m-d H:i:s", $nowDate);
                        // $service->save();
                    };
                }
            } else if ($nowDate >= $dateThreeHoursAfter) {
                echo $service->first_products[0]->id . ' ' .  "After than 3h" . " end <br/>";
                if (isset($dateOneDaysAfter)) {
                    echo date("Y-m-d H:i:s", $dateOneDaysAfter) . '<br>';
                    if (($nowDate >= $dateOneDaysAfter || $service->count_sent == 0) && $service->count_sent < 3) {
                        // send Mail here later
                        echo date("Y-m-d H:i:s", $dateOneDaysAfter) . '<br>';
                        var_dump($this->extend_order_action($service, 1, date("Y-m-d H:i:s", $nowDate)));
                        // $service->count_sent++;
                        // $service->sent_at = date("Y-m-d H:i:s", $nowDate);
                        // $service->save();
                    };
                }
            } else if ($nowDate >= $dateThreeHoursBefor && $to_date > $nowDate) {
                echo $service->first_products[0]->id . ' ' .  "befor than 3h" . " end <br/>";
                if (!$service->sent_at && $service->count_sent != -1) {
                    // send Mail here

                    // send fcm notification
                    $order = $service;
                    $title = " طلب رقم #" . $order->id;
                    $body = "نذكرك بقرب انتهاء وقت التأجير";

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

                    $fcm_request = new \stdClass;
                    $fcm_request->title = $title;
                    $fcm_request->body = $body;
                    $fcm_request->user_id = $order->owner_id;
                    $fcm_request->data = [
                        'order_id' => $order->id
                    ];
                    $is_send = $this->fcmRepo->run($fcm_request);
                    if ($is_send) {
                        $notification = new NotificationsLogs;
                        $notification->user_id = $order->owner_id;
                        $notification->title = $title;
                        $notification->body = $body;
                        $notification->type = "order";
                        $notification->model_id = $order->id;
                        $notification->save();
                    }
                    $service->sent_at = date("Y-m-d H:i:s", $nowDate);
                    $service->count_sent = -1;
                    $service->save();
                }
            } else {
                echo $service->first_products[0]->id . ' ' .  "less than 3h" . " end <br/>";
                if (!$service->sent_at || $service->count_sent == -1) {
                    // send Mail here

                    // send fcm notification
                    $order = $service;
                    $title = " طلب رقم #" . $order->id;
                    $body = "عزيزي " . $order->user->username . " تم انتهاء وقت التأجير أحرص على ارجاع المنتج في أقرب وقت تجنباً للعواقب";

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

                    $body = " تم انتهاء وقت التأجير";
                    $fcm_request = new \stdClass;
                    $fcm_request->title = $title;
                    $fcm_request->body = $body;
                    $fcm_request->user_id = $order->owner_id;
                    $fcm_request->data = [
                        'order_id' => $order->id
                    ];
                    $is_send = $this->fcmRepo->run($fcm_request);
                    if ($is_send) {
                        $notification = new NotificationsLogs;
                        $notification->user_id = $order->owner_id;
                        $notification->title = $title;
                        $notification->body = $body;
                        $notification->type = "order";
                        $notification->model_id = $order->id;
                        $notification->save();
                    }
                    $service->sent_at = date("Y-m-d H:i:s", $nowDate);
                    $service->count_sent = 0;
                    $service->save();
                }
            }
            echo '<hr>';

            // if ($endAt <= $dateTenDaysAgo) {
            //     var_dump($this->extend_order_action($service, 4));
            //     echo   $service->first_products[0]->id . ' ' . "more than 10d" . " end <br/>";
            // } else if ($endAt <= $dateThreeDaysAgo) {
            //     var_dump($this->extend_order_action($service, 2));
            //     echo $service->first_products[0]->id . ' ' .  "more than 3d" . " end <br/>";
            // } else if ($endAt <= $dateThreeHoursAgo) {
            //     var_dump($this->extend_order_action($service, 1));
            //     echo $service->first_products[0]->id . ' ' .  "more than 3h" . " end <br/>";
            // } else if ($endAt > $dateThreeHoursAgo) {
            //     echo $service->first_products[0]->id . ' ' .  "less than 3h" . " end <br/>";
            // }
        }
    }

    private function extend_order_action($order, $multiple, $to_date)
    {

        $delay_logs = new DelayLogs;
        $delay_logs->order_id = $order->id;
        $delay_logs->duration = 1;
        $delay_logs->user_id = $order->user_id;
        $delay_logs->user_id = $order->user_id;
        $delay_logs->paid = 'unpaid';
        // dd($delay_logs);

        $gs = GeneralSettings::first();  
        // mo2men@delay
        $application_percentage = ($order->user && $order->user->application_percentage != "") ? $order->user->application_percentage : $gs->application_percentage;
        $tax_percentage = ( $order->user && $order->user->tax_percentage != "") ? $order->user->tax_percentage : $gs->tax_percentage;
        // endEdit@delay


        $total_rent_price = 0;
        foreach ($order->products as $order_product) {
            // dd($order_product->product_id);
            $product = Product::find($order_product->product_id);
            if ($product) {
                $price_request = new \stdClass();
                $price_request->duration = 1;
                $price_request->price_per_day = ($product->price_per_day != null) ? $product->price_per_day : 0;
                $price_request->price_per_week = ($product->price_per_week != null) ? $product->price_per_week : 0;
                $price_request->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
                $price_request->quantity = $order_product->quantity;

                $total_rent_price += $this->orderRepo->calculat_price($price_request);
            }
        }

        $total_rent_price = round($total_rent_price, 2);

        // var_dump($total_rent_price);
        // exit;


        $application_amount = ($application_percentage / 100) * $total_rent_price;
        $tax_amount = ($tax_percentage / 100) * $total_rent_price;
        $total_after_tax = ($total_rent_price + $tax_amount) * $multiple;
        $owner_total = $total_after_tax - $application_amount - $tax_amount;

        $dateOneDaysBefore  = $order->sent_at;
        $delay_logs->from_date =  $dateOneDaysBefore;
        $delay_logs->to_date = $to_date;
        $delay_logs->application_percentage = $application_percentage;
        $delay_logs->tax_percentage = $tax_percentage;
        $delay_logs->sub_total = $total_rent_price;
        $delay_logs->application_amount = $application_amount;
        $delay_logs->tax_amount = $tax_amount;
        $delay_logs->total = $total_after_tax;
        $delay_logs->owner_total = $owner_total;

        // dd($delay_logs);
        $delay_logs->save();

        if (0) {
            $order->total += $delay_logs->total;
            $order->sub_total += $delay_logs->sub_total;
            $order->owner_total += $delay_logs->owner_total;
            $order->cash_back_amount += $delay_logs->cash_back_amount;
            $order->application_amount += $delay_logs->application_amount;
            $order->tax_amount += $delay_logs->tax_amount;
        }

        // $order->status_id = 8;

        $order->count_sent++;
        $order->sent_at = $to_date;
        $order->save();

        // Mail::send('email.mo2men', ['content' => $content], function ($message)  use ($title, $order) {
        //     $subject = $title;
        //     $message->to($order->user->email)->subject($subject);
        //     // $message->to('mom')->subject($subject);
        // });



        // $order_status_log = new OrderStatusLog;
        // $order_status_log->order_id = $order->id;
        // $order_status_log->status_id = $order->status_id;
        // $order_status_log->user_id = $order->user_id;
        // $order_status_log->save();





        // return ['owner_total' => $owner_total, 'total' => $total_after_tax];
    }
}
