<?php

namespace App\Events;

use App\Repositories\NotificationRepository;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentCallBack implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order; 
    public $transaction; 
    
    public function __construct($transaction,$order){
        $this->order = $order;
        $this->transaction = $transaction;
    }


    public function broadcastOn() {
         
        return new PresenceChannel('payment.'.$this->order->id);
    }
}
