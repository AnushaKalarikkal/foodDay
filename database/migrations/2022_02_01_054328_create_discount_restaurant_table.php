<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')
              ->references('id')
              ->on('discounts')->onDelete('cascade');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')
               ->references('id')
              ->on('restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('discount_restaurant');
    }
}
