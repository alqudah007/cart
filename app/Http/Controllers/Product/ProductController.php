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
          // $randomRelatedProducts=$this->getRandomProducts($products);
        $randProducts=$products->random(6); // How to send random products
        return view('frontend.index', ['products' => $products,'randomproducts' =>$randProducts]);
    }




}
