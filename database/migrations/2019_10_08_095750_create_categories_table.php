<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
/*            $table->unsignedBigInteger('user_id')->nullable()->comment('make user pay without need to register to our site');*/

            $table->string('name');
            $table->text('description');
            $table->integer('active')->comment('0 or 1');



            $table->timestamps();


            //  THIS IS IMOPRTSNT TO KEEP DATA INTEGRATED  IN CASE OF DELETION
/*            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
