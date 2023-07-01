<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketcomments', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->String('message')->nullable();
        $table->bigInteger('supportticket_id')->unsigned();
        $table->timestamps();
        $table->foreign('supportticket_id')->references('id')->on('supporttickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticketcomments');
    }
}
