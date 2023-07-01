<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resourses', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->String('first_name')->nullable();
        $table->String('last_name')->nullable();
        $table->String('user_name')->unique();
        $table->String('email')->unique();
        $table->String('mobile')->nullable();
        $table->bigInteger('location_id')->unsigned();
        $table->bigInteger('role_id')->unsigned();
        $table->String('designation')->nullable();

        $table->timestamps();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('resourses');
    }
}
