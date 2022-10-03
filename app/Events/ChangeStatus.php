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
use App\Models\Order;

class ChangeStatus implements ShouldBroadcast{
    
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order; 
    
    public function __construct(Order $order){
        $this->order = $order;
    }

    
    public function broadcastOn(){
     
        return new PresenceChannel('order.change_status.'.$this->order->id);
    }
}
