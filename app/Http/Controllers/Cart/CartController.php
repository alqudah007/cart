<?php

namespace App\Http\Controllers\Cart;

use App\Backend\Order;
use App\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Serializer;


class CartController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->only(['checkout', 'pay']);
    }

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
       // $currentTotal = Session::has('cart') ? Session::get('cart')['total'] : 0;

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

              //  $currentTotal += (float)$product->price;

            } else {
                //  add the new item to the cart
                $currentCart[$product->id] = [
                    'quantity' => 1,
                    'price' => $product->price,
                    'product' => $product,
                ];


                //$currentTotal += (float)$product->price;

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


            //$currentTotal += (float)$product->price;

        }

        //$currentCart['total'] = $currentTotal;
        Session::put('cart', $currentCart);
        Session::put('total', $this->getTotalFromCart());


        return back();


    }


    public function getTotalFromCart()
    {
        $temptotal = 0;
        if (Session::has('cart') && !empty(Session::has('cart'))) {

            foreach (Session::get('cart') as $cartItem) {
                $temptotal += $cartItem['quantity'] * $cartItem['price'];
            }


        }
        return $temptotal;

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

        session::forget('cart'); // Better ( official ) OK
        session::forget('total'); //
        // session::pull('cart');// ALso pull from array of session OK

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

        // dd(Session::get('cart'));
        # 2 ways for charge !!
        # THIS METHOD  CALLED https://stripe.com/docs/api/charges/create
        # this method used by german video and all other videos on the net for direct check out !


        \Stripe\Stripe::setApiKey('sk_test_KK52J2XjGmgUmE5K4rkfU4rH00C82BeIxd'); # public key from strip
        try {

            #
            $AMOUNT_in_cent = Session::get('total');

            # $aymanCharge contains the response data return form Stripe
            $aymanCharge = \Stripe\Charge::create([
                'source' => $request->stripeToken,
                'description' => 'This is my decription for this transaction ::::'.serialize(Session::get('cart')),
                'amount' => $AMOUNT_in_cent * 100,//convert cent to dollar
                'currency' => 'usd',
                // ayman add these based on the documentation stripe
                'capture' => true,
                /*'customer' => \auth::id(), If I add this i need to see customer share in strip   # strip shared user needed since the strip read that user id  is not match with strip test
                # https://stripe.com/docs/connect/shared-customers*/
                'metadata' => [
                    'namezzzzz' => 'z3moootzzzzz',
                    'type' => 'XXlarg - mazarati',
                    'address' => $request->address,

                ],


            ]);

            Session::flash('pay-done', '$$$$$$$$$ PayDOneBRO $$$$$$$$ ');
            Session::flash('receipt_url', $aymanCharge->receipt_url);
            Session::put('aymanCharge', $aymanCharge);

            // $orderObj=new Order();
            Order::Create([
                'user_id' => Auth::id(),
                'cart' => serialize(Session::get('cart')),
                'amount' => $aymanCharge->amount,
                'receipt_url' => $aymanCharge->receipt_url,
                'strip_charge_id' => $aymanCharge->id,

            ]);

            Session::forget('cart');
            //dd($aymanCharge); // this contian all the charge details
            return response()->redirectToRoute('cart.paydone');

        } catch (\Exception $e) {
            Session::flash('pay-faild', $e->getMessage());
            //dd($e->getMessage()); // "Invalid API Key provided: #sk_test*******************************eIxd"
            return response()->redirectToRoute('cart.paydone')->withErrors($e->getMessage());
        }


    }


    public function paydone()
    {
        return view('cart.paydone');
    }
}
