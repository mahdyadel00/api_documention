<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\ExtendedRequest;
use App\Models\ExtensionStatus;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Repositories\OrderRepository;
use App\Repositories\FcmRepository;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\Order\Rented;
use App\Models\WalletLog;
use App\Models\GeneralSettings;
use App\Models\NotificationsLogs;
use App\Events\UnReadMessages;
use App\Events\ChangeStatus;
use App\Events\PaymentCallBack;
use App\Models\OrderStatusLog;
use App\Repositories\NotificationRepository;
use App\Services\PaymentService;
use App\Models\PaymentLog;
use App\Models\ApplicationTransaction;
use App\Models\ErrorLog;
use App\User;
use Mail;

use Auth;


class OrderController extends ApiController
{

    public $orderRepo;
    public $fcmRepo;
    public $notifyRepo;

    public function __construct(OrderRepository $orderRepo, FcmRepository $fcmRepo, NotificationRepository $notifyRepo)
    {
        $this->orderRepo = $orderRepo;
        $this->fcmRepo = $fcmRepo;
        $this->notifyRepo = $notifyRepo;
        parent::__construct();
    }

    public function index(Request $request)
    {
        if ($request->status_id) {
            if ($request->status_id != 11) {
                $this->validate($request, [
                    'status_id' => 'required|integer|exists:order_status,id',
                ]);
            }
        }

        try {
            $orders = $this->orderRepo->orders(Auth::user()->id, $request);
            return response()->json($orders);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function details($order_id)
    {
        try {
            $order = Order::with(['user', 'products',  'products.product.photos', 'products.product.city', 'status_logs', 'payment_logs', 'extended_requests', 'payment_method'])->findOrFail($order_id);
            $order->owner_id = ($order->products) ? $order->products[0]->product->user_id : "";
            return response()->json($order);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function _details($order_id)
    {
        try {
            $order = Order::with(['products',  'products.product.photos', 'products.product.city', 'status_logs'])->findOrFail($order_id);
            $order->owner_id = ($order->products) ? $order->products[0]->product->user_id : "";

            $total = [];
            foreach ($order->products as $k => $rent_product) {
                $product = $rent_product->product;
                $price_request = new \stdClass();
                $price_request->from_date = $rent_product->from_date;
                $price_request->to_date = $rent_product->to_date;
                $price_request->price_per_day = ($product->price_per_day != null) ? $product->price_per_day : 0;
                $price_request->price_per_week = ($product->price_per_week != null) ? $product->price_per_week : 0;
                $price_request->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
                $price_request->quantity = $rent_product->quantity;

                $total = $this->orderRepo->calculat_price2($price_request);
            }
            return response()->json($total);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {

        // var_dump($request);
        // exit;
        $this->validate($request, [
            'products' => 'required|json',
        ]);

        $rent_products = json_decode($request->products);

        $_product = Product::find($rent_products[0]->id);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->owner_id = $_product->user_id;
        $order->status_id = 1;


        $order->note = $request->note;
        $order->payment_method_id = $request->payment_method;
        $order->save();

        $order_status_log = new OrderStatusLog;
        $order_status_log->order_id = $order->id;
        $order_status_log->status_id = 1;
        $order_status_log->user_id = auth()->user()->id;
        $order_status_log->save();


        foreach ($rent_products as $rent_product) {
            $product = Product::find($rent_product->id);
            $order_products = new OrderProduct();
            $order_products->user_id = Auth::user()->id;
            $order_products->order_id = $order->id;
            $order_products->owner_id = $product->user_id;
            $order_products->product_id = $rent_product->id;
            $order_products->from_date = \Carbon\Carbon::parse($rent_product->from_date);
            $order_products->to_date = \Carbon\Carbon::parse($rent_product->to_date);
            $order_products->quantity = $rent_product->quantity;
            $order_products->price_per_day =  ($product->price_per_day != null) ? $product->price_per_day : 0;
            $order_products->price_per_week =  ($product->price_per_week != null) ? $product->price_per_week : 0;
            $order_products->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
            if ($rent_product->delivery_type) {
                $order_products->delivery_type = $rent_product->delivery_type;
            }

            $price_request = new \stdClass();
            $price_request->from_date = $rent_product->from_date;
            $price_request->to_date = $rent_product->to_date;
            $price_request->price_per_day = ($product->price_per_day != null) ? $product->price_per_day : 0;
            $price_request->price_per_week = ($product->price_per_week != null) ? $product->price_per_week : 0;
            $price_request->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
            $price_request->quantity = $rent_product->quantity;

            $order_products->total = $this->orderRepo->calculat_price($price_request);
            $order_products->save();
        }



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

        $this->orderRepo->broadcast_notification_create_order($order);


        $response = [
            'status' => true,
            'message' => "The Order has been Rented successfully!"
        ];


        return response()->json($response, 200);
    }


    public function faTOen($string)
    {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    }

    public function change_status(Request $request)
    {



        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
            'status_id' => 'required|integer|exists:order_status,id',
        ]);

        $order = Order::with(['payment_logs'])->find($request->order_id);


        if ($order->status_id == 11) {
            $response = [
                'status' => false,
                'message' => "The Order already refused before! ",
            ];
            return response()->json($response, 200);
        }

        if ($order->extension_status_id != 1 && $order->extension_status_id != 4 && $request->status_id == 9) {
            $extended_request = ExtendedRequest::where('order_id', $order->id)->orderBy('id', 'DESC')->first();
            if ($extended_request->paid == 'unpaid') {
                $response = [
                    'status' => false,
                    'message' => "You have to pay for the extended time first! ",
                ];
                return response()->json($response, 200);
            }
        }


        $order->status_id = $request->status_id;
        if ($request->owner_refuse_reason) {
            $order->owner_refuse_reason = $request->owner_refuse_reason;
        }
        if ($request->renter_refuse_reason) {
            $order->renter_refuse_reason = $request->renter_refuse_reason;
        }

        if ($request->status_id == 2) {
            $order->is_extended = 0;
        }

        $order->save();
        $order = Order::with(['payment_logs'])->find($request->order_id);

        // return $order->status_id;
        // return $order;



        $order_status_log = new OrderStatusLog;
        $order_status_log->order_id = $order->id;
        $order_status_log->status_id = $order->status_id;
        $order_status_log->user_id = auth()->user()->id;
        $order_status_log->save();



        // deliverd
        if ($order && $order->status_id == 8) {
            $products  = OrderProduct::where('order_id', $request->order_id)->get();
            $hour_english = $request->hour;
            $hour_array = explode(':', $request->hour);
            if (!is_numeric($hour_array[0])) {
                $hour_english_array = [];
                foreach ($hour_array as  $hvalue) {
                    $hour_english_array[] = $this->faTOen($hvalue);
                }
                $hour_english = implode(":", $hour_english_array);
            }
            foreach ($products as $pvalue) {
                $date_array_to_date = explode(' ', $pvalue->to_date);
                $pvalue->to_date = $date_array_to_date[0] . ' ' .  $hour_english;
                $date_array_from_date = explode(' ', $pvalue->from_date);
                $pvalue->from_date = $date_array_from_date[0] . ' ' .  $hour_english;
                $pvalue->save();
            }
        }
        //Retrieved
        if ($order && $order->status_id == 6) {
            // if ($order->payment_logs && ($order->payment_logs[count($order->payment_logs) - 1]->payment_method == "cash_on_received" || $order->payment_logs[count($order->payment_logs) - 1]->payment_method == "cash_on_return")) {
                //     $user = User::find($order->owner_id);
                //     $user->recover += $order->application_amount +  $order->tax_amount + $order->service_fees;
                //     $user->save();             
            // }

            $gs = GeneralSettings::first();
            $cash_back_percentage = ($order->user->cash_back_percentage != "") ? $order->user->cash_back_percentage : $gs->cash_back_percentage;

            $cash_back = 0;
            $total_rent_price = $order->sub_total;

            $cash_back = ($cash_back_percentage / 100) * $total_rent_price;
            if ($order->is_extended == 1) {
                $extended_request->cash_back_amount = $cash_back;
                $extended_request->cash_back_percentage = $cash_back_percentage;
                $extended_request->save();
            } else {
                $order->cash_back_amount = $cash_back;
                $order->cash_back_percentage = $cash_back_percentage;
                $order->save();
            }


            if ($order->application_amount != 0) {
                $application_transaction = new ApplicationTransaction;
                $application_transaction->amount = $order->application_amount;
                $application_transaction->type = "order_commission";
                $application_transaction->user_id = auth()->user()->id;
                $application_transaction->model_id = $order->id;
                $application_transaction->save();
            }


            if ($cash_back != 0) {
                $wallet_log = new WalletLog;
                $wallet_log->order_id = $order->id;
                $wallet_log->user_id = $order->user_id;
                $wallet_log->amount = $cash_back;
                $wallet_log->type = "cash_back";
                $wallet_log->approved = 1;
                $wallet_log->save();
            }
        }
        $this->orderRepo->broadcast_notification_change_status($order);
        // return count($order->extended_requests) == 0;
        $response = [
            'status' => true,
            'message' => "The Status changed to " . $order->status->en_name,
        ];

        return response()->json($response, 200);
    }


    public function order_status(Request $request)
    {
        if ($request->type) {
            if ($request->type == 'owner') {
                $status = OrderStatus::where('owner', 1)->get();
            } else if ($request->type == 'tenant') {
                $status = OrderStatus::where('tenant', 1)->get();
            }
        } else {
            $status = OrderStatus::get();
        }

        return response()->json($status, 200);
    }



    public function extend_order_action(Request $request)
    {
        // return auth()->user()->id;
        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
            'duration' => 'required|integer',
            'payment_method' => 'required|in:wallet,cash_on_received,visa,master,mada,applepay,cash_on_return',
        ]);


        $order = Order::find($request->order_id);
        if ($order->status_id == 13 || $order->status_id == 16) {
            $response = [
                'status' => false,
                'message' => "The request is already in the extension status",
            ];
            return response()->json($response, 200);
        }


        if ($order->status_id != 8) {
            $response = [
                'status' => false,
                'message' => "You are not allowed to extend in this case",
            ];
            return response()->json($response, 200);
        }


        $order->status_id = 13;
        $order->extension_status_id = 2;

        if ($request->payment_method != 'wallet')
            $order->save();


        $extended_request = new ExtendedRequest;
        $extended_request->order_id = $request->order_id;
        $extended_request->duration = $request->duration;
        $extended_request->payment_method = $request->payment_method;
        $extended_request->status_id = 13;
        $extended_request->user_id = Auth::user()->id;

        $gs = GeneralSettings::first();
        $application_percentage = ($order->user->application_percentage != "") ? $order->user->application_percentage : $gs->application_percentage;
        $tax_percentage = ($order->user->tax_percentage != "") ? $order->user->tax_percentage : $gs->tax_percentage;


        $total_rent_price = 0;
        foreach ($order->products as $order_product) {
            $product = Product::find($order_product->product_id);
            $price_request = new \stdClass();
            $price_request->duration = $request->duration;
            $price_request->price_per_day = ($product->price_per_day != null) ? $product->price_per_day : 0;
            $price_request->price_per_week = ($product->price_per_week != null) ? $product->price_per_week : 0;
            $price_request->price_per_month = ($product->price_per_month != null) ? $product->price_per_month : 0;
            $price_request->quantity = $order_product->quantity;

            $total_rent_price += $this->orderRepo->calculat_price($price_request);
        }

        $total_rent_price = round($total_rent_price, 2);

        // var_dump($total_rent_price);
        // exit;
        $application_amount = ($application_percentage / 100) * $total_rent_price;
        $tax_amount = ($tax_percentage / 100) * $total_rent_price;
        $total_after_tax = $total_rent_price + $tax_amount;
        $owner_total = $total_after_tax - $application_amount - $tax_amount;

        $extended_request->from_date = $order->products[0]->to_date;
        $from = $order->products[0]->to_date;

        $extended_request->to_date = \Carbon\Carbon::parse($from)->addDays($request->duration)->toDateTimeString();
        $extended_request->application_percentage = $application_percentage;
        $extended_request->tax_percentage = $tax_percentage;
        $extended_request->sub_total = $total_rent_price;
        $extended_request->application_amount = $application_amount;
        $extended_request->tax_amount = $tax_amount;
        $extended_request->total = $total_after_tax;
        $extended_request->owner_total = $owner_total;

        if ($request->payment_method == 'wallet') {
            // return  auth::user()->balance();
            if ($total_after_tax >  auth::user()->balance()) {
                $response = [
                    'status' => false,
                    'message' => "You don't have enough balance",
                ];
                return response()->json($response, 200);
            } else {
                $order->save();
            }
        }
        // return auth::user()->balance();


        // if ($request->payment_method == 'cash_on_received' || $request->payment_method == 'cash_on_return') {
        $extended_request->paid = 'unpaid';
        // }else{
        //     $extended_request->paid = 'paid';
        // }



        $extended_request->save();

        $order_status_log = new OrderStatusLog;
        $order_status_log->order_id = $order->id;
        $order_status_log->status_id = $order->status_id;
        $order_status_log->user_id = auth()->user()->id;
        $order_status_log->save();



        $title = " طلب رقم #" . $order->id;
        $body = "لديك طلب تمديد جديد";


        // send fcm notification
        $fcm_request = new \stdClass;
        $fcm_request->title = $title;
        $fcm_request->body = $body;
        $fcm_request->user_id = $order->owner_id;
        $fcm_request->data = [
            'order_id' => $order->id
        ];
        // return $fcm_request->user_id;
        $is_send = $this->fcmRepo->run($fcm_request);
        if ($is_send) {
            $notification = new NotificationsLogs;
            $notification->user_id = $order->owner_id;
            $notification->title = $title;
            $notification->body = $body;
            $notification->type = "order";
            $notification->model_id = $order->id;
            $notification->save();

            $counts = $this->notifyRepo->countUnReaded($order->owner_id);
            broadcast(new UnReadMessages($counts, $order->owner_id))->toOthers();
        }
        broadcast(new ChangeStatus($order))->toOthers();

        //send Mail
        $content = $title . "<br />" . $body;
        Mail::send('email.template', ['content' => $content], function ($message)  use ($title, $order) {
            $subject = $title;
            $message->to($order->user->email)->subject($subject);
        });

        $response = [
            'status' => true,
            'message' => "The order extension has been sent to the lessor",
        ];
        return response()->json($response, 200);
    }

    public function confirm_to_delever(Request $request)
    {

        // return 'true';
        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        $order = Order::with(['payment_logs'])->find($request->order_id);

        $extended_request = ExtendedRequest::where('order_id', $request->order_id)->orderBy('id', 'DESC')->first();
        if (!$extended_request) {
            $response = [
                'status' => false,
                'message' => "Extended Request not exist",
            ];
            return response()->json($response, 200);
        }

        $extended_request->paid = "paid";
        $extended_request->save();

        if ($extended_request->payment_method == 'cash_on_received' || $extended_request->payment_method == 'cash_on_return') {

            $payment_log = new PaymentLog;
            $payment_log->order_id = $order->id;
            $payment_log->user_id = $order->user_id;
            $payment_log->payment_method = $extended_request->payment_method;
            $payment_log->amount = $extended_request->total;
            $payment_log->transaction_id = "";
            $payment_log->save();

            if ($extended_request->application_amount + $extended_request->tax_amount != 0) {
                // $wallet_log_owner = new WalletLog;
                // $wallet_log_owner->order_id = $order->id;
                // $wallet_log_owner->user_id = $order->owner_id;
                // $wallet_log_owner->type = "debts";
                // $wallet_log_owner->payment_method = "wallet";
                // $wallet_log_owner->amount = $extended_request->application_amount + $extended_request->tax_amount;
                // $wallet_log_owner->approved = 1;
                // $wallet_log_owner->save();

                if ($order->owner->balance() >=  $extended_request->application_amount + $extended_request->tax_amount) {
                    $wallet_log_owner = new WalletLog;
                    $wallet_log_owner->order_id = $order->id;
                    $wallet_log_owner->user_id = $order->owner_id;
                    $wallet_log_owner->type = "debts";
                    $wallet_log_owner->payment_method = "wallet";
                    $wallet_log_owner->amount = $extended_request->application_amount + $extended_request->tax_amount;
                    $wallet_log_owner->approved = 1;
                    $wallet_log_owner->save();
                } elseif ($order->owner->balance() > 0) {
                    $wallet_log_owner = new WalletLog;
                    $wallet_log_owner->order_id = $order->id;
                    $wallet_log_owner->user_id = $order->owner_id;
                    $wallet_log_owner->type = "debts";
                    $wallet_log_owner->payment_method = "wallet";
                    $wallet_log_owner->amount = $order->owner->balance();
                    $wallet_log_owner->approved = 1;
                    
                    $amount = $extended_request->application_amount + $extended_request->tax_amount - $order->owner->balance();

                    $wallet_log_owner->save();

                    $user = User::find($order->owner_id);
                    $user->recover += $amount;
                    $user->save();
                } else {
                    $user = User::find($order->owner_id);
                    $user->recover += $extended_request->application_amount +  $extended_request->tax_amount;
                    $user->save();
                }

                if ($extended_request->payment_method == 'cash_on_return') {
                    // return $order;
                    $request->merge(['is_approved' => 1]);
                    $this->accept_or_refuse_extend_order($request);
                }
            }


            // $user = User::find($order->owner_id);
            // $user->recover += $extended_request->application_amount +  $extended_request->tax_amount;
            // $user->save();
        }
        $order->is_extended = 0;
        $order->extension_status_id = 4;
        $order->save();
        ExtendedRequest::where('order_id', $request->order_id)->whereIN('status_id', ['14', '16'])->update(['paid' => 'paid']);
       


        // $order = Order::with(['payment_logs' , 'extended_requests'])->find($request->order_id);
        // $this->orderRepo->broadcast_notification_change_status($order);
        // $counts = $this->notifyRepo->countUnReaded($order->user_id);
        // broadcast(new UnReadMessages($counts, $order->user_id))->toOthers();
        // broadcast(new ChangeStatus($order))->toOthers();

        $response = [
            'status' => true,
            'message' => "The payment is confirmed for the extended time Successfully!",
        ];

        return response()->json($response, 200);
    }


    public function accept_or_refuse_extend_order(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
            'is_approved' => 'required',
        ]);

        // return $request->all();
        $order = Order::with(['payment_logs'])->find($request->order_id);

        $extended_request = ExtendedRequest::where('order_id', $order->id)->orderBy('id', 'DESC')->first();
        if (!$extended_request) {
            $response = [
                'status' => false,
                'message' => "Extended Request not exist",
            ];
            return response()->json($response, 200);
        }

        $extended_request->status_id = ($request->is_approved == 1) ? (($extended_request->payment_method == 'cash_on_return' && $order->is_extended == 0) ? 16 : 14) : 15;
        if ($request->reason) {
            $extended_request->reason = $request->reason;
        }

        $order_status_log = new OrderStatusLog;
        $order_status_log->order_id = $order->id;
        $order_status_log->status_id = $extended_request->status_id;
        $order_status_log->user_id = auth()->user()->id;
        $order_status_log->save();
        // return $order->is_extended;
        if ($request->is_approved == 1) {
            if ($extended_request->payment_method == 'cash_on_received' || ($extended_request->payment_method == 'cash_on_return'  && $order->is_extended == 1) || $extended_request->payment_method == 'wallet') {
                $order->status_id = 8;
            } else if ($extended_request->payment_method == 'cash_on_return'  && $order->is_extended == 0) {
                $order->status_id = 16;
            } else {
                $order->status_id = 5;
            }
        } else {
            $order->status_id = 8;
            $order->is_extended = 0;
        }
        $order->extension_status_id = ($request->is_approved == 1) ? (($extended_request->payment_method == 'cash_on_return' && $order->is_extended == 0) ? 5 : 3)  : 4;

        if (($request->is_approved == 1 && $extended_request->payment_method != 'cash_on_return') || ($order->is_extended == 1 && $extended_request->payment_method == 'cash_on_return')) {

            $order->total += $extended_request->total;
            $order->sub_total += $extended_request->sub_total;
            $order->owner_total += $extended_request->owner_total;
            $order->cash_back_amount += $extended_request->cash_back_amount;
            $order->application_amount += $extended_request->application_amount;
            $order->tax_amount += $extended_request->tax_amount;


            if ($extended_request->payment_method != 'cash_on_received' && $extended_request->payment_method != 'cash_on_return') {
                $extended_request->paid = 'paid';

                if ($extended_request->payment_method == 'wallet') {
                    $wallet_log = new WalletLog;
                    $wallet_log->order_id = $order->id;
                    $wallet_log->user_id = $order->user_id;
                    $wallet_log->type = "payed_order";
                    $wallet_log->payment_method = "wallet";
                    $wallet_log->amount = $extended_request->total;
                    $wallet_log->approved = 1;
                    $wallet_log->save();


                    $wallet_log_owner = new WalletLog;
                    $wallet_log_owner->order_id = $order->id;
                    $wallet_log_owner->user_id = $order->owner_id;
                    $wallet_log_owner->type = "received_order";
                    $wallet_log_owner->payment_method = "wallet";
                    $wallet_log_owner->amount = $extended_request->owner_total;
                    $wallet_log_owner->approved = 1;
                    $wallet_log_owner->save();


                    $payment_log = new PaymentLog;
                    $payment_log->order_id = $order->id;
                    $payment_log->user_id = $order->user_id;
                    $payment_log->payment_method = "wallet";
                    $payment_log->amount = $extended_request->total;
                    $payment_log->transaction_id = "";
                    $payment_log->save();
                }
            }



            $products  = OrderProduct::where('order_id', $order->id)->get();
            foreach ($products as $pvalue) {
                $pvalue->to_date = date('Y-m-d H:i:s', strtotime($pvalue->to_date . ' + ' . $extended_request->duration . ' days'));
                $pvalue->save();
            }
        }

        // if ($request->is_approved == 1)
        if ($request->is_approved == 1 && $extended_request->payment_method == 'cash_on_return' && $order->is_extended == 0)
            $order->is_extended = 1;


        $extended_request->save();
        $order->save();
        $order = Order::with(['payment_logs', 'extended_requests'])->find($request->order_id);

        $this->orderRepo->broadcast_notification_change_status($order);


        // $counts = $this->notifyRepo->countUnReaded($order->user_id);
        // broadcast(new UnReadMessages($counts, $order->user_id))->toOthers();
        // broadcast(new ChangeStatus($order))->toOthers();

        $response = [
            'status' => true,
            'message' => "The order extension status changed Successfully",
        ];
        return response()->json($response, 200);
    }

    public function change_extended_order_status(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
            'extension_status_id' => 'required|integer|exists:extension_status,id',
        ]);

        $order = Order::find($request->order_id);
        $order->extension_status_id = $request->extension_status_id;
        $order->status_id = 5;
        $order->save();

        // send fcm notification
        $title = "The Order #" . $order->id;
        $body = "The Status changed to " . $order->extension_status->en_name;

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

        //send Mail
        $content = $title . "<br />" . $body;
        Mail::send('email.template', ['content' => $content], function ($message)  use ($title, $order) {
            $subject = $title;
            $message->to($order->user->email)->subject($subject);
        });


        $response = [
            'status' => true,
            'message' => "The Status changed to " . $order->extension_status->en_name,
        ];
        return response()->json($response, 200);
    }

    public function extension_status()
    {
        return ExtensionStatus::get();
    }

    public function test_notify()
    {
        $fcm_request = new \stdClass;
        $fcm_request->title = "test title";
        $fcm_request->body = "test body";
        $fcm_request->user_id = request()->get("user_id");
        $fcm_request->data = [
            'order_id' => 8
        ];
        return $this->fcmRepo->run($fcm_request);
    }

    public function update_note(Order $order, Request $request)
    {
        if ($request->owner_note != "") {
            $order->owner_note = $request->owner_note;
            $order->save();
            broadcast(new ChangeStatus($order))->toOthers();
        }

        $response = [
            'status' => true,
            'message' => "The note Updated Successfully!",
        ];
        return response()->json($response, 200);
    }


    public function invoice(Order $order)
    {
        $data['order'] = $order;
        $data['title'] = "Invoice";
        return view("admin.orders.order_tpl", $data);
    }

    public function generate_pdf(Order $order)
    {
        $data['order'] = $order;
        $data['title'] = "Invoice";
        return $this->orderRepo->export_pdf($order);
    }

    public function extended_order_pdf(ExtendedRequest $extended_order)
    {
        $data['extended_order'] = $extended_order;
        $data['order'] = Order::find($extended_order->id);
        $data['title'] = "Invoice";
        return $this->orderRepo->export_extended_order_pdf($extended_order);
    }

    public function checkout(Request $request, PaymentService $payment)
    {



        if ($request->payment_method == 'wallet' || $request->payment_method == 'cash_on_received' ||  $request->payment_method == 'cash_on_return') {
            $this->validate($request, [
                'order_id' => 'required|integer|exists:orders,id',
                'payment_method' => 'required|in:wallet,cash_on_received,cash_on_return',
            ]);
        } else {
            $this->validate($request, [
                'order_id' => 'required|integer|exists:orders,id',
                'payment_method' => 'required|in:visa,master,mada,applepay',
                'card_number' => 'required',
                'expiry_year' => 'required',
                'expiry_month' => 'required',
                'cvv' => 'required',
            ]);
        }



        //                $error_log = new ErrorLog;
        //                $error_log->type = "checkout_data";
        //                $error_log->input_request = json_encode($request->all());
        //                $error_log->message = "checkout_data";
        //                $error_log->error = "";
        //                $error_log->save();

        $order = Order::with(['payment_logs'])->find($request->order_id);
        if ($request->is_extended && $request->is_extended == 1) {
            $order->is_extended = $request->is_extended;
            $extended_order = ExtendedRequest::where('order_id', $order->id)->orderBy('id', 'desc')->first();
        } else {
            $order->is_extended = 0;
        }
        $order->save();
        $total = ($request->is_extended) ? $extended_order->total : $order->total;
        //          foreach($order->products as $product){
        //              $total += $product->total;
        //          }

        if ($request->payment_method == 'cash_on_received' || $request->payment_method == 'cash_on_return') {
            if ($order->is_extended == 1) {
                $order->status_id = 8;
            } else {
                $order->status_id = 5;
            }
            $order->save();

            $payment_log = new PaymentLog;
            $payment_log->order_id = $order->id;
            $payment_log->user_id = $order->user_id;
            $payment_log->payment_method = $request->payment_method;
            $payment_log->amount = $total;
            $payment_log->transaction_id = "";
            $payment_log->save();

            $order_status_log = new OrderStatusLog;
            $order_status_log->order_id = $order->id;
            $order_status_log->status_id = $order->status_id;
            $order_status_log->user_id = auth()->user()->id;
            $order_status_log->save();

            // comment for report walletLog
            if ($order->application_amount + $order->tax_amount + $order->service_fees != 0) {
                // $wallet_log_owner = new WalletLog;
                // $wallet_log_owner->order_id = $order->id;
                // $wallet_log_owner->user_id = $order->owner_id;
                // $wallet_log_owner->type = "debts";
                // $wallet_log_owner->payment_method = "wallet";
                // if ($request->is_extended && $extended_order->application_amount + $extended_order->tax_amount != 0) {
                //     $wallet_log_owner->amount = $extended_order->application_amount + $extended_order->tax_amount;
                // } else {
                //     $wallet_log_owner->amount = $order->application_amount + $order->tax_amount + $order->service_fees;
                // }

                // $wallet_log_owner->approved = 1;
                // $wallet_log_owner->save();

                if ($order->owner->balance() >  $order->application_amount + $order->tax_amount + $order->service_fees) {
                    $wallet_log_owner = new WalletLog;
                    $wallet_log_owner->order_id = $order->id;
                    $wallet_log_owner->user_id = $order->owner_id;
                    $wallet_log_owner->type = "debts";
                    $wallet_log_owner->payment_method = "wallet";
                    if ($request->is_extended && $extended_order->application_amount + $extended_order->tax_amount != 0) {
                        $wallet_log_owner->amount = $extended_order->application_amount + $extended_order->tax_amount;
                    } else {
                        $wallet_log_owner->amount = $order->application_amount + $order->tax_amount + $order->service_fees;
                    }

                    $wallet_log_owner->approved = 1;
                    $wallet_log_owner->save();
                } elseif ($order->owner->balance() > 0) {
                    $wallet_log_owner = new WalletLog;
                    $wallet_log_owner->order_id = $order->id;
                    $wallet_log_owner->user_id = $order->owner_id;
                    $wallet_log_owner->type = "debts";
                    $wallet_log_owner->payment_method = "wallet";
                    $wallet_log_owner->amount = $order->owner->balance();

                    $wallet_log_owner->approved = 1;

                    if ($request->is_extended && $extended_order->application_amount + $extended_order->tax_amount != 0) {
                        $amount = $extended_order->application_amount + $extended_order->tax_amount + $extended_order->service_fees - $order->owner->balance();
                    } else {
                        $amount = $order->application_amount + $order->tax_amount + $order->service_fees - $order->owner->balance();
                    }
                    
                    $wallet_log_owner->save();

                    $user = User::find($order->owner_id);
                    $user->recover += $amount;
                    $user->save();
                } else {
                    $user = User::find($order->owner_id);
                    $user->recover += $order->application_amount +  $order->tax_amount + $order->service_fees;
                    $user->save();
                }
            }


            $this->orderRepo->broadcast_notification_change_status($order);
            return ['status' => true, 'message' => "Payment will be made upon received"];
        }

        if ($request->payment_method == 'wallet') {

            if ($this->orderRepo->total_wallet(auth()->user()->id) >= $total) {
                $wallet_log = new WalletLog;
                $wallet_log->order_id = $order->id;
                $wallet_log->user_id = auth()->user()->id;
                $wallet_log->type = "payed_order";
                $wallet_log->payment_method = "wallet";
                $wallet_log->amount = $total;
                $wallet_log->approved = 1;
                $wallet_log->save();


                $wallet_log_owner = new WalletLog;
                $wallet_log_owner->order_id = $order->id;
                $wallet_log_owner->user_id = $order->owner_id;
                $wallet_log_owner->type = "received_order";
                $wallet_log_owner->payment_method = "wallet";
                if ($request->is_extended) {
                    $wallet_log_owner->amount = $extended_order->owner_total;
                } else {
                    $wallet_log_owner->amount = $order->owner_total;
                }
                $wallet_log_owner->approved = 1;
                $wallet_log_owner->save();


                $payment_log = new PaymentLog;
                $payment_log->order_id = $order->id;
                $payment_log->user_id = $order->user_id;
                $payment_log->payment_method = "wallet";
                $payment_log->amount = $total;
                $payment_log->transaction_id = "";
                $payment_log->save();




                if ($order->is_extended == 1) {
                    $order->status_id = 8;
                } else {
                    $order->status_id = 6;
                }
                $order->save();

                $order_status_log = new OrderStatusLog;
                $order_status_log->order_id = $order->id;
                $order_status_log->status_id = $order->status_id;
                $order_status_log->user_id = auth()->user()->id;
                $order_status_log->save();

                $this->orderRepo->broadcast_notification_change_status($order);

                return ['status' => true, 'message' => "payment with wallet successfully"];
            } else {

                $error_log = new ErrorLog;
                $error_log->type = "checkout";
                $error_log->input_request = json_encode($request->all());
                $error_log->message = "The value in the wallet is insufficient to pay";
                $error_log->error = "insufficient wallet";
                $error_log->save();
                return ['status' => false, 'message' => "The value in the wallet is insufficient to pay"];
            }
        }



        $holder_name = auth()->user()->first_name . " " . auth()->user()->last_name;
        $request_data = array_merge([
            'holder_name' => $holder_name,
            'payment_brand' => strtoupper($request->payment_method),
            'amount' => $total,
            'email' => auth()->user()->email,
            'user_id' => auth()->user()->id,
            'return_payment' => 'return_payment',
            'data' => [
                'order_id' => $order->id,

            ],
        ], $request->all());


        $response = (object) $payment->checkout($request_data);

        if ($response) {
            if (isset($response->result)) {
                if (isset($response->result->code) && $response->result->code == '000.200.000') {



                    return [
                        'status' => true,
                        'message' => $response->result->description,
                        'redirect_url' => $response->redirect->url
                    ];
                }

                $error_log = new ErrorLog;
                $error_log->type = "checkout";
                $error_log->input_request = json_encode($request->all());
                $error_log->message = $response->result->description;
                $error_log->error = json_encode($response);
                $error_log->save();

                return ['status' => false, 'message' => $response->result->description];
            }
        }

        $error_log = new ErrorLog;
        $error_log->type = "checkout";
        $error_log->input_request = json_encode($request->all());
        $error_log->message = "transaction";
        $error_log->error = "transaction";
        $error_log->save();
        return ['status' => false, 'message' => "error transaction"];
    }

    public function return_payment(Request $request, PaymentService $payment)
    {

        $response = (object) $payment->transaction($request->all());
        if ($response) {
            $check_payed = PaymentLog::where('transaction_id', $response->id)->first();
            if ($check_payed) {
                $data = ['status' => false,  'data' => ['message' => "Payed Before"]];
            } else {
                if (isset($response->result)) {
                    if (isset($response->result->code) && $response->result->code == '000.100.110') {
                        $order = Order::with(['payment_logs'])->find($request->order_id);
                        if ($order->is_extended == 1) {
                            $extended_order = ExtendedRequest::where('order_id', $order->id)->orderBy('id', 'desc')->first();
                            $order->status_id = 8;
                        } else {
                            $order->status_id = 6;
                        }

                        $order->save();

                        $payment_log = new PaymentLog;
                        $payment_log->order_id = $order->id;
                        $payment_log->user_id = $order->user_id;
                        $payment_log->payment_method = strtolower($response->paymentBrand);
                        $payment_log->amount = $response->amount;
                        $payment_log->transaction_id = $response->id;
                        $payment_log->save();


                        $wallet_log_owner = new WalletLog;
                        $wallet_log_owner->order_id = $order->id;
                        $wallet_log_owner->user_id = $order->owner_id;
                        $wallet_log_owner->type = "received_order";
                        $wallet_log_owner->payment_method =  strtolower($response->paymentBrand);
                        if ($order->is_extended == 1) {
                            $wallet_log_owner->amount = $extended_order->owner_total;
                        } else {
                            $wallet_log_owner->amount = $order->owner_total;
                        }

                        $wallet_log_owner->approved = 1;
                        $wallet_log_owner->save();

                        // broadcast(new PaymentCallBack($response,$order))->toOthers();

                        $this->orderRepo->broadcast_notification_change_status($order);


                        $data = ['status' => true, 'data' => ['message' => $response->result->description, 'response' => json_encode($response)]];
                    } else {
                        $data = ['status' => false,  'data' => ['message' => $response->result->description]];
                    }
                }
            }
        } else {
            $data = ['status' => false,  'data' => ['message' => $response]];
        }


        return view('frontend.return_payment', $data);
    }

    public function add_product_to_order(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer',
        ]);

        return $this->orderRepo->add_product_to_order($request->order_id, $request->product_id, $request->quantity);
    }

    public function user_taxes()
    {
        $gs = GeneralSettings::first();
        $user = auth()->user();
        $application_percentage = ($user->application_percentage != "") ? $user->application_percentage : $gs->application_percentage;
        $tax_percentage = ($user->tax_percentage != "") ? $user->tax_percentage : $gs->tax_percentage;
        $cash_back_percentage = ($user->cash_back_percentage != "") ? $user->cash_back_percentage : $gs->cash_back_percentage;
        $service_fees = ($user->service_fees && $user->service_fees != "") ? $user->service_fees : $gs->service_fees;

        return [
            'application_percentage' => $application_percentage,
            'tax_percentage' => $tax_percentage,
            'cash_back_percentage' => $cash_back_percentage,
            'service_fees' => $service_fees,
        ];
    }
}
