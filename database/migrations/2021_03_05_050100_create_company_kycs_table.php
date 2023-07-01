<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_kycs', function (Blueprint $table) {
            $table->id();
            $table->string('kyc_document_name')->nullable();
            $table->bigInteger('company_general_id')->unsigned();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('company_kycs');
    }
}
