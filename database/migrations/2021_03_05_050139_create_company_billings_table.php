<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_billings', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('pan')->unique();
            $table->string('gstn')->unique();
            $table->string('tan')->unique();
            $table->bigInteger('company_general_id')->unsigned();
            $table->text('billing_address');
            $table->timestamps();
            $table->foreign('company_general_id')->references('id')->on('company_generals')->onDelete('cascade');
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_billings');
    }
}
