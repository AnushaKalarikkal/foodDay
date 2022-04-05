<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooditemOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fooditem_order', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fooditem_id');

            $table->foreign('fooditem_id')->references('id')->on('fooditems')->onDelete('cascade');

            $table->unsignedBigInteger('order_id');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

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
        Schema::dropIfExists('fooditem_order');
    }
}
