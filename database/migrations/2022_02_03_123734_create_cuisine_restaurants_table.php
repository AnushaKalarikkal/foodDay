<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisineRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_restaurants', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')
                  ->references('id')
                  ->on('restaurants')->onDelete('cascade');
            $table->unsignedBigInteger('cuisine_id');
            $table->foreign('cuisine_id')
                  ->references('id')
                  ->on('cuisines')->onDelete('cascade');
           
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
        Schema::dropIfExists('cuisine_restaurants');
    }
}
