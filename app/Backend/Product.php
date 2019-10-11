<?php

namespace App\Backend;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'brand', 'price', 'description', 'image_name'];

    //TODO add the random product feature
    public function getRandomProducts()
    {

        //$products=Product::all()->chunk(3); // chunk spilt the collect to 3 - 3- 3 but not random
        $products = Product::all()->random(3);
        return $products;
    }

    //define the relationship
    // * - 1 (many products belongs to 1 category )
    public function category(){
        return $this->belongsTo(Category::class);
    }


    // Relationship many to many between Questionfavorites and user
    public function attributes(){
        // note the 'user_id','question_id' are optionals
        //return $this->belongsToMany(Question::class,'favorites','user_id','question_id')->withTimestamps();
        //  favorites the data base table (
        return $this->belongsToMany(Attribute::class,'products__attributes')->withTimestamps();
    }

   /* // Relationship many to many
    public function valuesofattribute()
    {
        return $this->belongsToMany(Attribute::class,'products_attributes_values')->withTimestamps();

    }*/
}
