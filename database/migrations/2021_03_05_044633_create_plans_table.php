<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inventory_id')->unsigned();
            $table->bigInteger('location')->unsigned();
            $table->text('description');
            $table->integer('resource_price');
            $table->integer('num_seats');
            $table->string('area');
            $table->string('meeting_room_credits')->nullable();
            $table->string('printer_credits')->nullable();
            $table->timestamps();
            $table->foreign('location')->references('id')->on('location_generals')->onDelete('cascade');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
