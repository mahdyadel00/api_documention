<?php

namespace App\Http\Controllers\Frontend;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\User;

class ChatController extends FrontendController
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['title'] = "Chat";
        $this->data['to'] = $_GET['to'];
        $this->data['order_id'] = '100';
        $this->data['product_id'] = $_GET['product_id'];
        $this->data['product_from'] = $_GET['product_from'];
        $this->data['product_to'] = $_GET['product_to'];
        $this->data['from'] = $_GET['from'];
        // broadcast(new MessageSent($message->load('user'),$request->to))->toOthers();
        // var_dump($this->data);
        // exit;
        return view('frontend.chat',$this->data);
    }

    public function fetch_messages(){
        return Message::with('user')->get();
    }

    public function send_messages(Request $request){
        $message = auth()->user()->messages()->create([
            'message' => $request->message,
            'to' => $request->to
        ]);

        broadcast(new MessageSent($message->load('user'),$request->to))->toOthers();

        return ['status' => 'success'];
    }

    public function order_session($order_id,$to){
//        $user = User::find( Order::find($order_id)->user_id);
//        auth()->login($user);
        if( !(Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == (int)$to) ) {
            abort("404");
        }
        $this->data['title'] = "Chat";
        $this->data['order_id'] = $order_id;
        $this->data['to'] = $to;
        return view('frontend.chat',$this->data);
    }

    public function fetch_order_messages($order_id,$to){
        if(Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == $to) {
        $order = Order::find($order_id);
            return Message::where('order_id', $order_id)->where('to',$to)->where(function($q)use($to,$order){
                $q->whereIn('user_id',[$to,$order->user_id]);
            })->with('user')->get();
        }else{
            return [];
        }
    }


    public function send_order_messages($order_id,$to,Request $request){
        if(Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == $to) {
            $message = auth()->user()->messages()->create([
                'message' => $request->message,
                'order_id' => $order_id,
                'to' => $to
            ]);

            broadcast(new MessageSent($message->load('user'),$to))->toOthers();
            return ['status' => 'success'];
        }else{
            return ['status' => 'fail'];
        }


    }

}
