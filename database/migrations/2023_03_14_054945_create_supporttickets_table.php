<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportticketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporttickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sub_category_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('location_id')->unsigned();
            $table->text('ticket_description')->nullable();
            $table->String('image')->nullable();
            $table->String('status')->nullable();
            $table->timestamps();
            $table->foreign('sub_category_id')->references('id')->on('supportsubcategories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('location_generals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supporttickets');
    }
}
