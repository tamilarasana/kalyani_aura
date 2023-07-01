<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->integer('gender')->nullable();
            $table->string('area_of_interest')->nullable();
            $table->string('code')->nullable();
            $table->string('mobile')->nullable()->unique();
            $table->string('designation')->nullable();
            $table->unsignedBigInteger('work_station')->nullable();
            $table->unsignedBigInteger('working_company')->nullable();
            // $table->bigInteger('working_company')->unsigned();
            $table->string('profile_image')->nullable();
            $table->string('spoc')->nullable();
            $table->string('password')->nullable();
            $table->string('admin')->nullable();
            $table->string('location')->nullable();
            $table->string('company')->nullable();
            $table->string('fb_token')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            // $table->bigInteger('role_id')->unsigned();
            $table->string('user_status')->nullable();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('userroles')->onDelete('cascade');
            $table->foreign('work_station')->references('id')->on('location_generals')->onDelete('cascade');
            $table->foreign('working_company')->references('id')->on('company_generals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
