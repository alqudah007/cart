<?php

namespace App\Http\Controllers\Order;

use App\Backend\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // thin controller - fat model
        $Orderobj =new Order();
        return view('order.index',['orders'=>$Orderobj->getUserOrders()]);

    }


}
