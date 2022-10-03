<?php

namespace App\Mail\Order;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; 

class Created extends Mailable{
    
    use Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function build(){
        return $this->view('email.order.created')
                    ->with([
                        'order' => $this->order,
                    ]);
    }
    
}