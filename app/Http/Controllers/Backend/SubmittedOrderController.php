<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubmittedOrder;
use App\Models\ProductReport;
use App\Models\DistinguishProduct;
use App\Models\Category;
use App\Models\ProductPhotos;
use App\Models\ErrorLog;
use App\Models\Job;
use  App\USER;
use Image;
use Auth;
use Session;
use Validator;
use App\Models\Message;
// @mido
use App\Models\deliverytype;
use App\Models\Reviews;
use App\Models\status;
// endEdit

// @mido
use DB;
// endEdit

class SubmittedOrderController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {

        $this->data['title'] = "submittedorder";
        $submittedOrders = SubmittedOrder::latest()->with('messages');

        if ($request->is_blocked && $request->is_blocked != "") {
            $submittedOrders = $submittedOrders->where('is_blocked', $request->is_blocked - 1);
        }

        $this->data['submittedOrders'] = $submittedOrders->paginate(15);
        // return count($this->data['submittedOrders'][0]->main_categories);
        return view('admin.submitted_order.index', $this->data);
    }



    public function change_block_status(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:submitted_orders,id',
            'is_blocked' => 'required|boolean',
        ]);

        $submittedOrder = SubmittedOrder::find($request->id);
        $submittedOrder->is_blocked = $request->is_blocked;
        $submittedOrder->save();


        Session::flash('success', 'The Block status has been changed successfully!');
        $response = [
            'status' => true,
            //     'message' => "The Status changed",
        ];
        return response()->json($response);
    }


    public function chat_all_submitted_order(Request $req)
    {
        $this->data['submittedOrder'] = $submittedOrder = SubmittedOrder::where('id', $req->submitted_order_id)->first();
        $this->data['title'] = "Submitted Order #" . $req->submitted_order_id . " , owner: " . $this->data['submittedOrder']->user->name;

        $user_id = $submittedOrder->user->id;
        $this->data['messages'] = $tos = DB::select("select user_id,  users.name from messages 
        left join users on users.id = messages.user_id
        where user_id <> $user_id
        and submitted_order_id = $req->submitted_order_id
        and `to` = $user_id group by user_id, users.name");

        // return $this->data['messages'];

        foreach ($tos as $kt => $vt) {
            $to = $vt->user_id;
            $messages = DB::select("select count(*) as total from messages where user_id in ($user_id, $to)
            and `to` in ($user_id, $to) and submitted_order_id = $req->submitted_order_id limit 1    
            ");
            $vt->total = $messages[0]->total;
        }

        return view('admin.submitted_order.table_chat_Submitted', $this->data);
    }

    public function submitted_order_chat(Request $req)
    {
        $this->data['submittedOrder'] = SubmittedOrder::where('id', $req->submitted_order_id)->first();
        $this->data['title'] = "Submitted Order #" . $req->submitted_order_id . " , owner: " . $this->data['submittedOrder']->user->name;
        $this->data['messages'] = Message::where('submitted_order_id', $req->submitted_order_id)
            ->whereIn('user_id', [$req->user_id, $req->to])
            ->whereIn('to', [$req->user_id, $req->to])
            ->with('user')->latest()->get();

        // var_dump(count($this->data['messages']));
        // exit;
        // return view('admin.orders.chat_logs',$this->data);

        return view('admin.submitted_order.chat', $this->data);
    }
}
