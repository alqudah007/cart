<?php

namespace App\Backend;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'cart', 'strip_charge_id', 'amount', 'receipt_url']; // note I dont make user_id fallible here!



    # the relationship with Order
    public function user(){
       return $this->belongsTo('App\User');
    }


    public function getUserOrders()
    {
        // The user orders relationship
        $orders = Auth::user()->orders; // we call the relation as probability not like function
         //dd($orders);
        //$orders = Order::all();

        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });


        return $orders;


    }



    public function deserializeCart($orderCollection){

    }

}
