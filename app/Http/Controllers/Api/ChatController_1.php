<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\ApiController;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Image;
use DB;
use App\Models\ErrorLog;


class ChatController_1 extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }



    public function fetch_product_messages($product_id, $to)
    {

        // if (Auth::user()->id == Product::find($product_id)->user_id || Auth::user()->id == $to) {
        $messages =  Message::where('product_id', $product_id)->where(
            function ($q) use ($to) {
                $q->whereIn('user_id', [$to, Auth::user()->id]);
                $q->whereIn('to', [$to, Auth::user()->id]);
            }
        )->with('user')->get();

        // var_dump($messages);
        return $messages;
        // } else {
        //     return ['status' => false];
        // }
    }

    public function send_product_messages($product_id, $to, Request $request)
    {


        $this->validate($request, [
            'image' => "image|mimes:jpeg,png,jpg,gif,svg|max:8048",
            'file'   => 'mimes:doc,pdf,docx|max:8048',
            'voice' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ]);

        // if (Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == $to) {

        $additions = [];
        if ($request->image) {
            $image = $request->image;
            $extension = $image->extension();
            $imageName = time() . rand(1000, 9999) . '.' . $extension;
            $ImageUpload = Image::make($image);
            $originalPath = public_path('uploads');
            $ImageUpload->save($originalPath . "/" . $imageName);
            $additions['image'] = $imageName;
        }

        if ($request->file) {
            $file = $request->file;
            $extension = $file->extension();
            $fileName = time() . rand(1000, 9999) . '.' . $extension;
            $file->move(public_path('uploads/files/'), $fileName);
            $additions['file'] = $fileName;
        }

        if ($request->voice) {
            $voice = $request->voice;
            $extension = $file->extension();
            $voiceName = time() . rand(1000, 9999) . '.' . $extension;
            $voice->move(public_path('uploads/voices/'), $voiceName);
            $additions['voice'] = $voiceName;
        }

        if ($request->latitude && $request->longitude) {
            $additions['latitude'] = $request->latitude;
            $additions['longitude'] = $request->longitude;
        }

        if (empty($additions)) {
            $additions = (object)[];
        }

        $message = auth()->user()->messages()->create([
            'message' => $request->message,
            'product_id' => $product_id,
            'to' => $to,
            'additions' => json_encode($additions)
        ]);

        // var_dump($message);
        // exit;

        try {
            // broadcast(new MessageSent($message->load('user'), $to))->toOthers();



            return ['status' => 'success', 'message' => $message];
        } catch (\Exception $e) {

            $error_log = new ErrorLog;
            $error_log->type = "Exception_chat";
            $error_log->input_request = json_encode($request->all());
            $error_log->message = $e->getMessage();
            $error_log->error = json_encode($e);
            $error_log->save();
            return [
                'status' => false,
                'message' => "web socket server not running"
            ];
        }
        // } else {
        //     return ['status' => 'fail'];
        // }
    }



    public function fetch_order_messages($order_id, $to)
    {
        if (Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == $to) {
            $order = Order::find($order_id);
            $messages =  Message::where('order_id', $order_id)->where('to', $to)->where(
                function ($q) use ($to, $order) {
                    $q->whereIn('user_id', [$to, $order->user_id]);
                }
            )->with('user')->get();
            Message::where('order_id', $order_id)->where('to', $to)->where(
                function ($q) use ($to, $order) {
                    $q->whereIn('user_id', [$to, $order->user_id]);
                }
            )->update(['readed' => 1]);
            return $messages;
        } else {
            return ['status' => false];
        }
    }





    public function send_order_messages($order_id, $to, Request $request)
    {


        $this->validate($request, [

            'image' => "image|mimes:jpeg,png,jpg,gif,svg|max:8048",
            'file'   => 'mimes:doc,pdf,docx|max:8048',
            'voice' => 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ]);

        if (Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == $to) {

            $additions = [];
            if ($request->image) {
                $image = $request->image;
                $extension = $image->extension();
                $imageName = time() . rand(1000, 9999) . '.' . $extension;
                $ImageUpload = Image::make($image);
                $originalPath = public_path('uploads');
                $ImageUpload->save($originalPath . "/" . $imageName);
                $additions['image'] = $imageName;
            }

            if ($request->file) {
                $file = $request->file;
                $extension = $file->extension();
                $fileName = time() . rand(1000, 9999) . '.' . $extension;
                $file->move(public_path('uploads/files/'), $fileName);
                $additions['file'] = $fileName;
            }

            if ($request->voice) {
                $voice = $request->voice;
                $extension = $file->extension();
                $voiceName = time() . rand(1000, 9999) . '.' . $extension;
                $voice->move(public_path('uploads/voices/'), $voiceName);
                $additions['voice'] = $voiceName;
            }

            if ($request->latitude && $request->longitude) {
                $additions['latitude'] = $request->latitude;
                $additions['longitude'] = $request->longitude;
            }

            if (empty($additions)) {
                $additions = (object)[];
            }

            $message = auth()->user()->messages()->create([
                'message' => $request->message,
                'order_id' => $order_id,
                'to' => $to,
                'additions' => json_encode($additions)
            ]);
            try {
                broadcast(new MessageSent($message->load('user'), $to))->toOthers();

                //                    $error_log = new ErrorLog;
                //                    $error_log->type = "chat";
                //                    $error_log->input_request = json_encode($request->all());
                //                    $error_log->message = "";
                //                    $error_log->error = json_encode($message);
                //                    $error_log->save();

                return ['status' => 'success'];
            } catch (\Exception $e) {

                $error_log = new ErrorLog;
                $error_log->type = "Exception_chat";
                $error_log->input_request = json_encode($request->all());
                $error_log->message = $e->getMessage();
                $error_log->error = json_encode($e);
                $error_log->save();
                return [
                    'status' => false,
                    'message' => "web socket server not running"
                ];
            }
        } else {
            return ['status' => 'fail'];
        }
    }

    public function order_session($order_id, $to)
    {

        //        if( !(Auth::user()->id == Order::find($order_id)->user_id || Auth::user()->id == (int)$to) ) {
        //            abort("404");
        //        }
        $this->data['title'] = "Chat";
        $this->data['order_id'] = $order_id;
        $this->data['to'] = $to;
        return view('frontend.chat', $this->data);
    }

    public function unread_messages()
    {
        $user_id = auth()->user()->id;


        $order_messages = DB::table("messages")->select('id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(order_id) as total"))
            ->where('to', $user_id)
            // ->where('user_id','!=',$user_id)
            ->where('readed', 0)
            ->groupBy("order_id")
            ->whereNull('product_id')
            ->latest()
            ->get();


        $messages = [];
        foreach ($order_messages as $k => $message) {
            // $order_messages[$k]->message = Message::with('order', 'order.user', 'order.products.product')->find($message->id);
            $messages[] = Message::with('order', 'order.user', 'order.products.product')->find($message->id);
        }



        // return ['messages' => $messages];
        // return ['messages' => $order_messages];

        $product_messages = DB::table("messages")->select('id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(product_id) as total"))
            ->where('to', $user_id)
            // ->where('user_id','!=',$user_id)
            ->where('readed', 0)
            ->groupBy("product_id")
            ->whereNull('order_id')
            ->latest()
            ->get();

        foreach ($product_messages as $kp => $messagep) {
            $messages[] = Message::with('product', 'product.user')->find($messagep->id);
        }



        // return ['total_message' => count($order_messages), 'messages' => $order_messages];
        // $messages = $order_messages.array_merge($product_messages);
        // $messages = (object) array_merge((array) $order_messages, (array) $product_messages);
        $total = count($product_messages) + count($order_messages);
        // var_dump($product_messages);
        // exit;
        return ['total_message' => $total, 'messages' => $messages];
    }

    public function read_message(Order $order)
    {

        Message::where('order_id', $order->id)->update(['readed' => 1]);
        return ['status' => true];
    }
}
