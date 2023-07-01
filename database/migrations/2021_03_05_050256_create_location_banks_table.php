<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->unique();
            $table->string('benificiary_name')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('branch')->nullable();
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
        Schema::dropIfExists('location_banks');
    }
}
