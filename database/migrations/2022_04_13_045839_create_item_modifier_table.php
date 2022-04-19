<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemModifierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_modifier', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fooditem_id');

            $table->foreign('fooditem_id')->references('id')->on('fooditems')->onDelete('cascade');

            $table->unsignedBigInteger('modifier_id');

            $table->foreign('modifier_id')->references('id')->on('modifiers')->onDelete('cascade');

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
        Schema::dropIfExists('item_modifier');
    }
}
