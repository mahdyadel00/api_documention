<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

use App\Models\Order;
use App\Models\Product;
use App\Models\SubmittedOrder;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat', function ($user) {
    return $user;
});


Broadcast::channel('chat.{orderId}.{to}', function ($user, $orderId,$to) {
    //return true;
    return ($user->id === Order::findOrNew($orderId)->user_id || $user->id === (int) $to) ? $user : null;
//    if ($user->id === Order::findOrNew($orderId)->user_id || $user->id === 1) {
//        return ['id' => $user->id, 'name' => $user->name];
//    }
});
/*
Broadcast::channel('order.{order}', function ($user, Order $order) {
    return $user->id === $order->user_id;
});
*/

Broadcast::channel('fofo', function ($user) {
    return 'test';
});

Broadcast::channel('productChat.{productChatId}', function ($user, $productChatId) {
    $args = explode("-",$productChatId);
    $productId = $args[0];
    $from = $args[1];
    $to = $args[2];
    // return  explode("-",$productChatId);
    // return ($user->id === Product::findOrNew($productId)->user_id || $user->id === (int) $from) ? $user : 'null';
    return ($user->id === Product::findOrNew($productId)->user_id || $user->id === (int) $to || $user->id === (int) $from) ? $user : null;
});


Broadcast::channel('submittedChat.{submittedChatId}', function ($user, $submittedChatId) {
    $args = explode("-",$submittedChatId);
    $submittedId = $args[0];
    $from = $args[1];
    $to = $args[2];
    return ($user->id === SubmittedOrder::findOrNew($submittedId)->user_id || $user->id === (int) $to || $user->id === (int) $from) ? $user : null;
});

Broadcast::channel('privatechat.{order}.{receiverid}', function ($user,$order,$receiverid) {
    return auth()->check();
});



Broadcast::channel('chat.unread_messages.{user_id}', function ($user,$user_id) {
     return $user_id;
});

Broadcast::channel('order.change_status.{order_id}', function ($user,$order_id) {
     return true;
});

Broadcast::channel('payment.{order_id}', function ($user,$order_id) {
     return true;
});


