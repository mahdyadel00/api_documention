<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Message;
use App\Models\ExtendedRequest;
use App\Models\OrderStatusLog;
use Illuminate\Support\Carbon;
use Image;
use Session;
// @midoshriks@DelayLogs
use App\Models\DelayLogs;
use App\Repositories\TransactionRepository;

class OrderController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        $this->data['title'] = "Orders";
        $orders = Order::with(['products'])->latest();
        $param = [];
        if ($request->status_id) {
            $param['status_id'] = $request->status_id;
        }
        if ($request->from_to_date && $request->from_to_date != "") {
            $from_to_date = explode("-", $request->from_to_date);
            $from = Carbon::parse($from_to_date[0])->format("Y-m-d");
            $to = Carbon::parse($from_to_date[1])->format("Y-m-d");
            $param['from'] = $from;
            $param['to'] = $to;
        }

        if ($request->submit) {
            return redirect(route('admin.orders', $param));
        }


        if ($request->get('status_id') && $request->get('status_id') != "all") {
            $orders = $orders->where('status_id', $request->get('status_id'));
        }

        if ($request->get('from') && $request->get('from') != "") {
            $param['from'] = $request->get('from');
            $this->data['from'] = $from = Carbon::parse($request->get('from'));
            $orders = $orders->where('created_at', ">=", $from);
        }

        if ($request->get('to') && $request->get('to') != "") {
            $param['to'] = $request->get('to');
            $this->data['to'] = $to = Carbon::parse($request->get('to'));
            $orders = $orders->where('created_at', "<=", $to);
        }

        //dd($orders->get());
    //dd($orders->get());
        // mo2men@dataTable
        // $this->data['orders']  = $orders->paginate(15)->appends($param);
        $this->data['orders']  = $orders->get();
        // endEdit@dataTable

        $this->data['satuses'] = OrderStatus::get();
        return view('admin.orders.index', $this->data);
    }

    public function chat_logs(Order $order)
    {
        $this->data['title'] = "Order #" . $order->id . " , with: " . $order->user->name;
        $this->data['order']  = $order;
        $this->data['messages'] = Message::where('order_id', $order->id)->with('user')->latest()->get();

        return view('admin.orders.chat_logs', $this->data);
    }

    public function details(Order $order, TransactionRepository $transaction)
    {
        $this->data['title'] = "Order #" . $order->id;
        $this->data['order']  = $order;
        $this->data['wallet_logs'] = $transaction->order_wallet_logs($order->id);
        $this->data['payment_logs'] = $transaction->order_payment_logs($order->id);
        $this->data['pending_transactions'] = $transaction->pending_transactions(null, $order->id);
        $this->data['extended_orders'] = ExtendedRequest::where('order_id', $order->id)->latest()->get();
        $this->data['order_status_logs'] = OrderStatusLog::where('order_id', $order->id)->get();
        // @midoshriks@DelayLogs
        $this->data['delay_logs'] = DelayLogs::where('order_id', $order->id)->latest()->get();
        // @endEdit        
        // dd($order);
        return view('admin.orders.details', $this->data);
    }

    public function transacions(Order $order, TransactionRepository $transaction)
    {
        $this->data['order'] = $order;
        $this->data['title'] = "Transactions (Order #" . $order->id . ")";
        $this->data['wallet_logs'] = $transaction->order_wallet_logs($order->id);
        $this->data['payment_logs'] = $transaction->order_payment_logs($order->id);
        $this->data['pending_transactions'] = $transaction->pending_transactions(null, $order->id);
        return view('admin.orders.transactions', $this->data);
    }


    public function change_cancel_status(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:orders,id',
            'is_cancel' => 'required|boolean',
        ]);

        $order = Order::find($request->id);
        $order->status_id =  17;

        // return $order;
        $order->save();


        Session::flash('success', 'The Cancel status has been changed successfully!');
        $response = [
            'status' => true,
            //     'message' => "The Status changed",
        ];
        return response()->json($response);
    }

}
