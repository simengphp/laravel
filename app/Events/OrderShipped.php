<?php

namespace App\Events;

use App\Http\Controllers\Demo\OrderController;
use App\Mail\OrderShippedMail;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderShipped
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    /**
     * 创建一个新的事件实例.
     *
     * @param  OrderController  $order
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function test()
    {
        $test = '我是一个测试';
        $arr = [
            '1712626930@qq.com',
            '476319748@qq.com'
        ];
        Mail::to($arr)->send(new OrderShippedMail($test));
    }
}
