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
        dd('index cart items');
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
        $currentTotal = 0;

        /*dump('Session::has(\'cart\')');
        dump(Session::has('cart'));
        sleep(2);*/

        if (Session::has('cart')) {
            $currentCart = Session::get('cart');
            $currentTotal = Session::get('cart')['total'];

            if (array_key_exists($product->id, $currentCart)) {
                //dump('item already in cart');
                //Session::get('cart')[$product->id]['quantity']++; THIS IS OK

                // update the quantity of the existance
                $currentCart[$product->id]['quantity']++;

                $currentTotal += ((float)$product->price * $currentCart[$product->id]['quantity']);

            } else {
                //  add the new item to the cart
                $currentCart[$product->id] = [
                    'quantity' => 1,
                    'price' => $product->price,
                    'product' => $product,
                ];


                $currentTotal+= (float)$product->price;

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


        /* if (!Session::has('cart') or empty(Session::get('cart'))) {


             dump('no array in session or it is empty');

             // SOLUTION A : make cart as array.
             // SOLUTION B : make cart as php class then make an object from it .

             $cart = [
                 $product->id => [
                     'quantity' => 1,
                     'price' => $product->price,
                     'product' => $product,
                 ]

             ];


             Session::put('cart', $cart);

             //(Session::get('cart'));

             return back();
         } else {
             dump(' cart is there already');

             if (array_key_exists($product->id, Session::get('cart'))) {
                 dump('we have this  item already in cart');


             } else {

                 $cart = [
                     $product->id => [
                         'quantity' => 1,
                         'price' => $product->price,
                         'product' => $product,
                     ]

                 ];


             }


         }
         //dd($request);*/


    }


    // dump session cart
    public function dumpsessioncart()
    {

        dd(Session::get('cart'));
    }


    public function sessionFlushAyman()
    {
        Session::flush();
        return 'Done';

    }
}
