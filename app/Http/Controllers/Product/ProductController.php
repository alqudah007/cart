<?php

namespace App\Http\Controllers\Product;

use App\Backend\Category;
use App\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        //$cat=Category::with('products')->get();
        //dd($cat);
        $products = Product::with(['attributes','category'])->get();// Ok
       $productno3=Product::find(3);//WRONG
        /*$temp=$products->attributes->values;*/
       //dd($products->category);//Ok
        //dd($products->attributes);//Ok

       // dd($productno3->category);//ok
        dd($productno3->attributes[0]);//ok color
        dd($productno3->attributes[0]->values);//ok  red
        dd($productno3->attributes[1]->name);//ok size



        //$singleproduct=Product::findOrFail(1)->attributes->name; not ok
        //dd($singleproduct);
        // $randomRelatedProducts=$this->getRandomProducts($products);
        $randProducts=$products->random(6); // How to send random products
        return view('frontend.index', ['products' => $products,'randomproducts' =>$randProducts]);
    }




}
