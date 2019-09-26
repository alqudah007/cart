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
}
