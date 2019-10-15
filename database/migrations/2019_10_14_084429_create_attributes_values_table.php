<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('value_id');
            $table->timestamps();

            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('value_id')->references('id')->on('values')->onDelete('cascade');
            // this is how we define the Primary key in Many-many
            // no  need to foreign key
            $table->unique(['attribute_id','value_id']); // user_id = 1 question_is =1 this will not repeated

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes_values');
    }
}
