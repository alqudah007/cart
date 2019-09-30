<?php

namespace App\Backend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=['cart','strip_charge_id','amount','receipt_url']; // note I dont make user_id fallible here!


}
