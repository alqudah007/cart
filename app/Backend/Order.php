<?php

namespace App\Backend;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'cart', 'strip_charge_id', 'amount', 'receipt_url']; // note I dont make user_id fallible here!


    public function getUserOrders()
    {

        $orders = Order::all();

        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        dd($orders);

    }

}
