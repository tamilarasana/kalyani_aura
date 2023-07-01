<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->bigInteger('reason_for_visit')->unsigned();
            // $table->bigInteger('company_id')->unsigned();
            // $table->bigInteger('user_id')->unsigned();
            $table->string('visit_from')->nullable();
            $table->date('date')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('reason_for_visit')->references('id')->on('reasonvisits')->onDelete('cascade');
            // $table->foreign('company_id')->references('id')->on('company_generals')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
