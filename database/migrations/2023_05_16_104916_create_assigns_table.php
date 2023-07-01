<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('announcement_id')->unsigned();
            // $table->bigInteger('assigned_person_id ')->unsigned();
            // // $table->bigInteger('user_id')->unsigned();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->bigInteger('ticket_sub_category ')->unsigned();
            // $table->string('assigned_to')->nullable();
            // $table->time('task_assigned_time')->nullable();
            // $table->time('task_solved_time')->nullable();
            // $table->string('status')->nullable();
            // $table->text('remarks')->nullable();
            // $table->timestamps();
            // $table->foreign('assigned_person_id')->references('id')->on('members');
            // $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigns');
    }
}
