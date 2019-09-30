<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->comment('make user pay without need to register to our site');
            $table->text('cart')->comment('SERIALIZED CART');// Full the cart for serialize / Deserialize
            $table->text('strip_charge_id');// strip_charge_id we can match it to charge in strip dashboard later
            $table->text('amount');
            $table->string('receipt_url')->comment('return from strip charge, invoice link pdf');
            $table->timestamps();


            //  THIS IS IMOPRTSNT TO KEEP DATA INTEGRATED  IN CASE OF DELETION
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
