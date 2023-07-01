<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostStreamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_stream_user', function (Blueprint $table) {
        $table->bigInteger('user_id')->unsigned();
        $table->bigInteger('post_stream_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('post_stream_id')->references('id')->on('post_streams');
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
        //
    }
}
