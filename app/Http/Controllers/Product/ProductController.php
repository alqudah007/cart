<?php

namespace App\Http\Controllers\Product;

use App\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return view('frontend.index', ['products' => $products]);
    }



    public function getRandomProducts(){

        $products=Product::all()->chunk(3); // chunk spilt the collect to 3 - 3- 3 but not random

        foreach($products as $pro){
            dump('=========');
            dump($pro);
        }
    }
}
