<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Events\ProductChat;
use App\Events\SubmittedChat;
use App\Http\Controllers\ApiController;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Image;
use DB;
use App\Models\ErrorLog;
use App\Models\SubmittedOrder;
use App\Models\NotificationsLogs;
use App\Events\UnReadMessages;
use App\Repositories\NotificationRepository;
use App\Repositories\FcmRepository;

class ChatController extends ApiController
{

    public function __construct(FcmRepository $fcmRepo, NotificationRepository $notifyRepo)
    {
        parent::__construct();
        $this->notifyRepo = $notifyRepo;
        $this->fcmRepo = $fcmRepo;
    }


    public function broadcast_notification_send_message($title, $body, $user_id, $model, $to, $chatId, $model_id)
    {

        // $title = " طلب رقم #" . $order->id;
        // $body = "مبروك، لديك طلب تأجير جديد";

        $fcm_request_user = new \stdClass;
        $fcm_request_user->title = $title;
        $fcm_request_user->body = $body;
        $fcm_request_user->user_id = $user_id;
        // $fcm_request_user->data = [
        //     'order_id' => $order->id
        // ];
        $is_send = $this->fcmRepo->run($fcm_request_user);
        // if ($is_send) {
        //     $notification_user = new NotificationsLogs;
        //     $notification_user->user_id = $user_id;
        //     $notification_user->title = $title;
        //     $notification_user->body = $body;
        //     $notification_user->type = "chat/$model/owner/$to/to/$to/chatId/$chatId";
        //     $notification_user->model_id = $model_id;
        //     $notification_user->save();
        // }

        // $counts = $this->notifyRepo->countUnReaded($user_id);
        // broadcast(new UnReadMessages($counts, $user_id))->toOthers();
    }

    public function fetch_product_messages($product_id, $from, $to)
    {


        if (Auth::user()->id == $from || Auth::user()->id == $to) {
            // DB::enableQueryLog();
            $messages =  Message::where('product_id', $product_id)->whereNull('order_id')->where(
                function ($q) use ($to, $from) {
                    $q->whereIn('user_id', [$to, $from]);
                    $q->whereIn('to', [$to, $from]);
                }
            )->orderby('id', 'desc')->with('user')->get();

            // Message::where('product_id', $product_id)->where('to', Auth::user()->id )->where('user_id', $to)
            // ->update(['readed' => 1]);

            return $messages;
        } else {
            return ['status' => false];
        }
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
            $product = Product::find($product_id);
            $third_part = ($product->user_id == Auth::user()->id) ? $to : Auth::user()->id;
            $chatId = "$product_id-$product->user_id-$third_part";
            // return $chatId;
            broadcast(new ProductChat($message->load('user'), $to, $chatId))->toOthers();
            $this->broadcast_notification_send_message(
                $product->ar_title,
                ($request->message) ?: 'لديك رسالة جديدة',
                $to,
                'product_id',
                Auth::user()->id,
                $chatId,
                $product_id
            );
            // broadcast(new MessageSent($message->load('user'), $to))->toOthers();

            return ['status' => 'success', 'message' => $message->load('user')];
            // return ['status' => 'success'];
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


    public function fetch_submitted_order_messages($submitted_order_id, $from, $to)
    {


        if (Auth::user()->id == $from || Auth::user()->id == $to) {
            // DB::enableQueryLog();
            $messages =  Message::where('submitted_order_id', $submitted_order_id)->where(
                function ($q) use ($to, $from) {
                    $q->whereIn('user_id', [$to, $from]);
                    $q->whereIn('to', [$to, $from]);
                }
            )->orderby('id', 'desc')->with('user')->get();

            // Message::where('product_id', $product_id)->where('to', Auth::user()->id )->where('user_id', $to)
            // ->update(['readed' => 1]);

            return $messages;
        } else {
            return ['status' => false];
        }
    }

    public function send_submitted_order_messages($submitted_order_id, $to, Request $request)
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
            'submitted_order_id' => $submitted_order_id,
            'to' => $to,
            'additions' => json_encode($additions)
        ]);


        try {
            $submitted_order = SubmittedOrder::find($submitted_order_id);
            $third_part = ($submitted_order->user_id == Auth::user()->id) ? $to : Auth::user()->id;
            $chatId = "$submitted_order_id-$submitted_order->user_id-$third_part";

            broadcast(new SubmittedChat($message->load('user'), $to, $chatId))->toOthers();
            $this->broadcast_notification_send_message(
                $submitted_order->ar_title,
                ($request->message) ?: 'لديك رسالة جديدة',
                $to,
                'submitted_id',
                Auth::user()->id,
                $chatId,
                $submitted_order_id
            );
            // broadcast(new MessageSent($message->load('user'), $to))->toOthers();

            return ['status' => 'success', 'message' => $message->load('user')];
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
            // return $order->user_id;
            $messages =  Message::where('order_id', $order_id)->whereNull('product_id')->where('to', $to)->where(
                function ($q) use ($to, $order) {
                    $q->whereIn('user_id', [$to, $order->user_id]);
                }
            )->orderby('id', 'desc')->with('user')->get();
            // Message::where('order_id', $order_id)->where('to', $to)->where(
            //     function ($q) use ($to, $order) {
            //         $q->whereIn('user_id', [$to, $order->user_id]);
            //     }
            // )->update(['readed' => 1]);
            // return count($messages);
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
        // return Order::find($order_id)->user_id;
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

                $order = Order::find($order_id);
                $title = " طلب رقم #" . $order->id;
                $f_msg = Message::where('order_id', $order_id)->first();
                if($f_msg)
                $to = $to != $order->owner_id ?  $to : $f_msg->user_id; 
                broadcast(new MessageSent($message->load('user'), $to))->toOthers();
                
                // return $to;

                $this->broadcast_notification_send_message(
                    $title,
                    ($request->message) ?: 'لديك رسالة جديدة',
                    $to,
                    'order_id',
                    Auth::user()->id,
                    0,
                    $order_id
                );
                //                    $error_log = new ErrorLog;
                //                    $error_log->type = "chat";
                //                    $error_log->input_request = json_encode($request->all());
                //                    $error_log->message = "";
                //                    $error_log->error = json_encode($message);
                //                    $error_log->save();

                return ['status' => 'success', 'message' => $message->load('user')];
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


    function findAllWithId($objects, $from, $to) {
        return array_filter($objects, function($toCheck) use ($from, $to) { 
            return $toCheck->user_id == $from && $toCheck->to == $to ; 
        });
    }

    public function unread_messages()
    {
        $user_id = auth()->user()->id;

        // DB::enableQueryLog();
        $order_messages = DB::table("messages")->select('id', 'order_id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(order_id) as total"))
            ->where('to', $user_id)
            ->where('readed', 0)
            // ->groupBy("order_id")
            ->groupBy(['order_id', 'user_id', 'to'])
            ->whereNotNull('order_id')
            ->latest()
            ->get();
        // $query = \DB::getQueryLog();
        // var_dump($query);
        // exit;
        // return $order_messages;
        $order_ids = [];
        foreach ($order_messages as $k => $message) {
            $order_ids[] = $message->order_id;
            $order_messages[$k]->message = Message::with('order', 'order.user', 'order.products.product')->find($message->id);
        }

        // return $order_ids;

        $order_messages_old = DB::table("messages")->select('id', 'order_id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(order_id) as total"))
            ->where(
                function ($q) use ($user_id) {
                    $q->where('to', $user_id);
                    $q->orwhere('user_id', $user_id);
                }
            )
            ->whereNotNull('order_id')
            ->whereNotIn('order_id', $order_ids)
            // ->groupBy("order_id")
            ->groupBy(['order_id', 'user_id', 'to'])
            ->latest()
            ->get();

        // return $order_messages_old;
        foreach ($order_messages_old as $koo => $messageoo) {
            $order_messages_old[$koo]->message = Message::with('order', 'order.user', 'order.products.product')->find($messageoo->id);
        }


        $product_messages = DB::table("messages")->select('id', 'product_id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(product_id) as total"))
            ->where('to', $user_id)
            ->where('readed', 0)
            ->groupBy(['product_id', 'user_id', 'to'])
            ->whereNotNull('product_id')
            ->latest()
            ->get();
        // return $product_messages;
        $product_ids = [];
        foreach ($product_messages as $kp => $messagep) {
            $product_ids[] = $messagep->product_id;
            $product_messages[$kp]->message = Message::with('product', 'product.user')->find($messagep->id);
        }

        $product_messages_old = DB::table("messages")->select('id', 'product_id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(product_id) as total"))
            ->whereNotNull('product_id')
            ->where(
                function ($q) use ($user_id) {
                    $q->where('to', $user_id);
                    $q->orwhere('user_id', $user_id);
                }
            )
            ->whereNotIn('product_id', $product_ids)
            // ->groupBy(['product_id', 'user_id', 'to'])
            ->groupBy(['product_id', 'user_id', 'to'])
            ->latest()
            ->get();
            // return $product_messages_old;

        foreach ($product_messages_old as $kpo => $messagepo) {
            $product_messages_old[$kpo]->message = Message::with('product', 'product.user')->find($messagepo->id);
        }

        $submitted_messages = DB::table("messages")->select('id', 'submitted_order_id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(submitted_order_id) as total"))
            ->where('to', $user_id)
            ->where('readed', 0)
            // ->groupBy("submitted_order_id")
            ->groupBy(['submitted_order_id', 'user_id', 'to'])
            ->whereNotNull('submitted_order_id')
            ->latest()
            ->get();

            // return ['s0'=>$user_id];
        $submitted_ids = [];
        foreach ($submitted_messages as $ks => $messagess) {
            $submitted_ids[] = $messagess->submitted_order_id;
            $submitted_messages[$ks]->message = Message::with('submitted', 'submitted.user')->find($messagess->id);
        }
        $submitted_messages_old = DB::table("messages")->select('id', 'submitted_order_id', DB::raw(" Max(id) as id"), DB::raw(" COUNT(submitted_order_id) as total"))
            ->whereNOTNull('submitted_order_id')
            ->where(
                function ($q) use ($user_id) {
                    $q->where('to', $user_id);
                    $q->orwhere('user_id', $user_id);
                }
            )
            ->whereNotIn('submitted_order_id', $submitted_ids)
            // ->groupBy("submitted_order_id")
            ->groupBy(['submitted_order_id', 'user_id', 'to'])
            ->latest()
            ->get();

        // return $submitted_messages_old;
        foreach ($submitted_messages_old as $kso => $messagesso) {
            $submitted_messages_old[$kso]->message = Message::with('submitted', 'submitted.user')->find($messagesso->id);
        }
        // return $submitted_messages_old;
        // mo2men@commetn
        // endEdit@comment
        $messages = [];
        foreach ($order_messages as  $vo) {
            $messages[] = $vo;
        };

        foreach ($order_messages_old as $vfo) {
            $messages[] = $vfo;
        };


        foreach ($product_messages as $vp) {
            $check = array_filter($messages, function($toCheck) use ($vp) { 
                return $toCheck->message->user_id == $vp->message->to && $toCheck->message->to == $vp->message->user_id  && $toCheck->message->product_id == $vp->message->product_id ; 
            });
            if(count($check) == 0){
                $messages[] = $vp;
            }
        };
        foreach ($product_messages_old as $vpo) {

            $check = array_filter($messages, function($toCheck) use ($vpo) { 
                return $toCheck->message->user_id == $vpo->message->to && $toCheck->message->to == $vpo->message->user_id  && $toCheck->message->product_id == $vpo->message->product_id ; 
            });
            if(count($check) == 0){
                $messages[] = $vpo;
            }
            
        };
     
        foreach ($submitted_messages as $vs) {

            // return ['vs'=>$vs];
            $check = array_filter($messages, function($toCheck) use ($vs) { 
                return $toCheck->message->user_id == $vs->message->to && $toCheck->message->to == $vs->message->user_id  && $toCheck->message->submitted_order_id == $vs->message->submitted_order_id ; 
            });
            if(count($check) == 0){
                $messages[] = $vs;
            }

            // $messages[] = $vs;
        };
        foreach ($submitted_messages_old as $vso) {
            
            $check = array_filter($messages, function($toCheck) use ($vso) { 
                return $toCheck->message->user_id == $vso->message->to && $toCheck->message->to == $vso->message->user_id  && $toCheck->message->submitted_order_id == $vso->message->submitted_order_id ; 
            });
            if(count($check) == 0){
                $messages[] = $vso;
            }


            // $messages[] = $vso;
        };

        usort($messages, function ($a, $b) {
            return ($b->id > $a->id);
        });

        $total = count($product_messages) + count($order_messages) + count($submitted_messages);
        // return ['total_message' => count($order_messages), 'messages' => $order_messages];
        return ['total_message' => $total, 'messages' => $messages];
    }

    public function read_messages($type, $id, $from)
    {
        if ($type == 'product_id')
            $messages =   Message::where($type, $id)->where('to', Auth::user()->id)->where('user_id', $from)->where('readed', '0')
                ->update(['readed' => 1]);
        elseif ($type == 'submitted_order_id')
            $messages =   Message::where($type, $id)->where('to', Auth::user()->id)->where('user_id', $from)->where('readed', '0')
                ->update(['readed' => 1]);
        else
            $messages =   Message::where($type, $id)->where('to', Auth::user()->id)->where('readed', '0')
                ->update(['readed' => 1]);

        if ($messages > 0) {
            return ['status' => true];
        } else {
            return ['status' => false];
        }
    }
}
