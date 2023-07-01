<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('location_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_name');
            $table->string('seating_capacity');
            $table->string('area');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->time("business_hours_s")->nullable();
            $table->time("business_hours_e")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('location_generals');
    }
}
