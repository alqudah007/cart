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



    // ENV there is relation between attr and value but in this table
    public function productattributevalue()
    {
        return $this->hasMany(Attribute::class,'products_attributes_values');

    }


}
