<?php

namespace App\Backend;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'brand', 'price', 'description', 'image_name'];


    public function getRandomProducts(){

        //$products=Product::all()->chunk(3); // chunk spilt the collect to 3 - 3- 3 but not random
        $products=Product::all()->random(3);
        return $products;
    }






    //TODO add the random product feature





}
