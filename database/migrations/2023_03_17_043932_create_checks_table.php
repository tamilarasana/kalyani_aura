<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->bigInteger('reason_for_visit')->unsigned();
            $table->string('visitor_from')->nullable();
            $table->date('date_check_in')->nullable();
            $table->time('time_check_in')->nullable();
            $table->time('time_check_out')->nullable();
            // $table->foreign('role_id')->references('id')->on('userroles')->onDelete('cascade');
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
        Schema::dropIfExists('checks');
    }
}
