<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    //
    //  define the relationship
    // * - 1 (many products belongs to 1 category )
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    // Define  one value hasMany ProductAttribute 1 - *
    public function productattribute()
    {
        return $this->hasMany(ProductAttribute::class);

    }

}
