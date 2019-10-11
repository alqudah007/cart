<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    //
    //  ProductAttribute
    // ProductAttribute belongs to one value * - 1
    public function value(){

        return $this->belongsTo(Value::class);
    }

}
