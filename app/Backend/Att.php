<?php

namespace App\Backend;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;


class Att extends Model
{
    protected $fillable = ['val', 'att', 'product_id'];


    //defien 1 to many
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
