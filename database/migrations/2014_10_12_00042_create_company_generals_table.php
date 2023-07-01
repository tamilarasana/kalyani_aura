<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('company_email')->unique();
            $table->string('contact_number');
            $table->string('web_url');
            $table->bigInteger('location')->unsigned();
            $table->string('reference');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('location')->references('id')->on('location_generals')->onDelete('cascade');
        });
    }  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_generals');
    }
}
