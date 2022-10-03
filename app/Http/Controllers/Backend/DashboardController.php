<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\SubmittedOrder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class DashboardController extends BackendController
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = "Dashboard";
         $this->data['orders_count'] = Order::count();
        $this->data['products_count'] = Product::count();
        $this->data['clients_count'] = User::where("role_id",3)->count();
        
         $this->data['new_orders'] = Order::where('status_id',1)->count();
         $this->data['compeleted_orders'] = Order::where('status_id',10)->count();
         $this->data['progress_orders'] = Order::whereIn('status_id',[2,3,4,5,6,7,8,9])->count();
         
         $this->data['blocked_products'] = Product::where('is_blocked',1)->count();
         $this->data['disabled_products'] = Product::where('is_active',0)->count();
         $this->data['activated_products'] = Product::where('is_active',1)->where('is_blocked',0)->count();
         
         $this->data['activated_users'] = User::where("role_id",3)->where('status',1)->count();
         $this->data['disabled_users'] = User::where("role_id",3)->where('status',0)->count();
         $this->data['blocked_users'] = User::where("role_id",3)->where('status',2)->count();
        
         // @midoshriks
        $this->data['SubmittedOrder_count'] = SubmittedOrder::count();
        $this->data['activated_SubmittedOrder'] = SubmittedOrder::where('is_active',1)->where('is_blocked',0)->count();
        $this->data['blocked_SubmittedOrder'] = SubmittedOrder::where('is_blocked',1)->count();
        $this->data['disabled_SubmittedOrder'] = SubmittedOrder::where('is_active',0)->count();
        // @endEdite

       // mo2men@accountant
       $orders = Order::get();
       $total_rent = 0;
       $total_tax = 0;
       $service_fees = 0;
       $owner_total = 0;
       $application_amount = 0;
       $remaining_application_total = 0;
       $cash_back_amount = 0;
       foreach ($orders as $order_val) {
           $total_rent += $order_val->total;
           $total_tax += $order_val->tax_amount;
           $service_fees += $order_val->service_fees;
           $owner_total += $order_val->owner_total;
           $application_amount += $order_val->application_amount;
           $remaining_application_total += $order_val->remaining_application_total;
           // $cash_back_amount += $order_val->cash_back_amount;
           //    foreach($order_val->products as $product){
           //         $total_rent += $product->total;
           //    }
       }
       $this->data['total_orders'] = $total_rent;
       $this->data['total_tax'] = $total_tax;
       $this->data['service_fees'] = $service_fees;
       $this->data['owner_total'] = $owner_total;
       $this->data['application_amount'] = $application_amount;
       $this->data['remaining_application_total'] = $remaining_application_total;
       // $this->data['cash_back_amount'] = $cash_back_amount;
       $total_unpaid = User::where('recover', '>', 0)->sum('recover');
       $this->data['total_unpaid'] = $total_unpaid;
       // dd($total_unpaid);


       $wallet_logs = \App\Models\WalletLog::where('approved',1)->get();
       $wallet_total = 0;
       foreach($wallet_logs as $wallet_log){
           if($wallet_log->type == 'withdrawal' || $wallet_log->type == 'refunds' || $wallet_log->type == 'payed_order' ||  $wallet_log->type == 'debts'){
               $wallet_total = $wallet_total - $wallet_log->amount;
           }else{
               $wallet_total = $wallet_total + $wallet_log->amount;  
           }
           
       }
       $this->data['wallet_total'] = $total_unpaid;

       // endEdit@accountant
        
        $orders_per_month = Order::get(['id', 'created_at'])->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('M');
        })->map(function ($order,$k){
            $total = 0;
           foreach($order as $order_val){
               foreach($order_val->products as $product){
                    $total += $product->total;
               }
           }
           return $total;
        })->toArray();
        $this->data['orders_per_month_keys'] = (array_keys($orders_per_month));
        $this->data['orders_per_month_values'] = (array_values($orders_per_month));
        
        $order_products = OrderProduct::with('product')->get(['id','rent_price','product_id'])->groupBy(function($q) {
                return $q->product_id;
         })->sortByDesc(function($product){
            return $product->count();
        })->take(5);
        $order_products_keys = [];
        $order_products_values = [];
        foreach ($order_products as $product){
            $order_products_values[] = $product->count();
            $order_products_keys[] = ($product[0]->product) ? $product[0]->product->en_title : "";
        }

        $this->data['order_products_keys'] = $order_products_keys;
        $this->data['order_products_values'] = $order_products_values;

        return view('admin.dashboard',$this->data);
    }
}
