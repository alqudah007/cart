<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{


    // Relationship many to many between Questionfavorites and user
    public function products(){
        // note the 'user_id','question_id' are optionals
        //return $this->belongsToMany(Question::class,'favorites','user_id','question_id')->withTimestamps();
        //  favorites the data base table (
        //return $this->belongsToMany(Product::class,'products__attributes')->withTimestamps();
        return $this->belongsToMany(Product::class,'products__attributes')->withTimestamps();
    }

    //
    public function aymans()
    {
        return $this->hasMany(Product::class,'aymans')->withTimestamps();
    }

    //  define the relationship
    // * - 1 (many products belongs to 1 category )
    public function values()
    {
        return $this->hasMany(Value::class);
    }


    // ENV there is relation between attr and value but in this table
    public function eav()
    {
        return $this->hasMany(Product::class,'products_attributes_values');

    }


}
