<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_order', function (Blueprint $table) {
            $table->id();

             $table->unsignedBigInteger('fooditem_id');

            $table->foreign('fooditem_id')->references('id')->on('fooditems')->onDelete('cascade');

            $table->unsignedBigInteger('orderstore_id');

            $table->foreign('orderstore_id')->references('id')->on('order_stores')->onDelete('cascade');

            $table->string('quantity');

            $table->string('food_item'); 
            
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
        Schema::dropIfExists('food_order');
    }
}
