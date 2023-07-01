<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_billings', function (Blueprint $table) {
            $table->id();
            $table->string('legal_business_name');
            $table->text('address');
            $table->string('notes_top');
            $table->string('notes_bottom');
            $table->string('gstn');
            $table->string('state');
            $table->string('city');
            $table->bigInteger('location_general_id')->unsigned();
            $table->timestamps();
            $table->foreign('location_general_id')->references('id')->on('location_generals')->onDelete('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_billings');
    }
}
