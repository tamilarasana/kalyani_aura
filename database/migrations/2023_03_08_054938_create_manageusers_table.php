<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manageusers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->string('status')->nullable();
            $table->string('password')->nullable();
            $table->foreign('role_id')->references('id')->on('userroles')->onDelete('cascade');
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
        Schema::dropIfExists('manageusers');
    }
}
