<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FooditemRestaurants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('fooditem_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fooditem_id');
            $table->foreign('fooditem_id')
              ->references('id')
              ->on('fooditems')->onDelete('cascade');
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
        //
      Schema::drop('fooditem_restaurant');
        
    }
}
