<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id(); 
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->text('image')->nullable();
            $table->datetime('schedule')->nullable();
            $table->datetime('expiration')->nullable();
            $table->time('schedule_time')->nullable();
            $table->date('schedule_date')->nullable();
            $table->time('expiration_time')->nullable();
            $table->date('expiration_date')->nullable();
            $table->text('message')->nullable();
            $table->text('stick_top')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
