<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('source')->nullable();
            $table->string('notification_description')->nullable();
            $table->bigInteger('entity_id')->unsigned();
            $table->bigInteger('post_owner_id')->unsigned();
            $table->bigInteger('action_person_id')->unsigned();
            $table->string('action_type')->nullable();
            $table->timestamps(); 
            $table->foreign('action_person_id')->references('id')->on('users');
            $table->foreign('post_owner_id')->references('id')->on('users');
            $table->foreign('entity_id')->references('id')->on('post_streams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
