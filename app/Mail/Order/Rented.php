<?php

namespace App\Mail\Order;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Rented extends Mailable
{

    use Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order, $title = null, $body = null)
    {
        $this->order = $order;
        $this->title = $title;
        $this->body = $body;
    }


    public function build()
    {

        return $this->subject($this->title)->view('email.order.rented')
            ->with([
                'order' => $this->order,
                'body' => $this->body
            ]);
    }
}
