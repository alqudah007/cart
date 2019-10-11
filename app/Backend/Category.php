<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    //  define the relationship
    // * - 1 (many products belongs to 1 category )
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
