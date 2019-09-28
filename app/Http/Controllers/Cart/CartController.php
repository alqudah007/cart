<?php

namespace App\Http\Controllers\Cart;

use App\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class CartController extends Controller
{
    //

    public function index()
    {
        # view all the cart items
        return view('cart.index');
    }


    // post
    public function addToCart(Product $product)
    {
        # 1- check session for cart
        # 2 - creat or add to the current session cart
        # 3- update total price and quantity


        # yes may be it  is empty []
        /* $isCartExists=Session::has('cart');
         dump($isCartExists); // true
         dd(Session::has('cart')); // true but it may be empty bro !*/
        $currentCart = null;
        $currentTotal = Session::has('cart') ? Session::get('cart')['total'] : 0;

        /*dump('Session::has(\'cart\')');
        dump(Session::has('cart'));
        sleep(2);*/

        if (Session::has('cart')) {
            $currentCart = Session::get('cart');

            if (array_key_exists($product->id, $currentCart)) {
                //dump('item already in cart');
                //Session::get('cart')[$product->id]['quantity']++; THIS IS OK
                //  $currentCart[$product->id]['quantity'])THIS IS OK

                // update the quantity of the existance
                $currentCart[$product->id]['quantity']++;

                $currentTotal += (float)$product->price;

            } else {
                //  add the new item to the cart
                $currentCart[$product->id] = [
                    'quantity' => 1,
                    'price' => $product->price,
                    'product' => $product,
                ];


                $currentTotal += (float)$product->price;

            }
        } else {
            // No cart at all
            $currentCart = [
                $product->id => [
                    'quantity' => 1,
                    'price' => $product->price,
                    'product' => $product,
                ],
            ];


            $currentTotal += (float)$product->price;

        }

        $currentCart['total'] = $currentTotal;
        Session::put('cart', $currentCart);
        return back();


    }


    // dump session cart
    public function dumpsessioncart()
    {

        dump(Session::get('cart'));
        dump(session()->all());// dump session array
    }


    public function sessionFlushAyman()
    {
        // Session::flush(); // this delete all session data !!

        //session::forget('cart'); // Better ( official ) OK
        session::pull('cart');// ALso pull from array of session OK

        return 'Done';

    }


    public function checkout()
    {
        return view('cart.checkout');
    }


    // this will recieve the STRIP form with _token ; then
    // prepare how much we need to charge Him
    public function pay(Request $request)
    {
        //  dd($request); this contain strip token now
        // we get token because the user provide correct card No and CCV no
        // here may be u can use some package for strip :
        // >>>>>>>>>>>>>>> https://stripe.com/docs/libraries#third-party-plugins
        // OR install native package :
        // >>>>>>>>>>>>>>> https://stripe.com/docs/libraries#php


        // server side integration in strip
        // >>> https://stripe.com/docs/payments/checkout/server#create-checkout-session
        // Copy - Past as is from link upove ^^^^^


        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_KK52J2XjGmgUmE5K4rkfU4rH00C82BeIxd');

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'T-shirt',
                'description' => 'Comfortable cotton t-shirt',
                'images' => ['https://example.com/t-shirt.png'],
                'amount' => 500,
                'currency' => 'usd',
                'quantity' => 1,
            ]],
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
        ]);

    }

}
