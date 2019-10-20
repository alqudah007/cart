<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAymanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aymans', function (Blueprint $table) {
            $table->bigIncrements('id');
            #fkcategories
            $table->unsignedBigInteger('product_id');
            $table->string('att');
            $table->string('val');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayman');
    }
}
