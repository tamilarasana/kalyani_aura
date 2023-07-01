`<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('members');
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('work_station')->unsigned();
            // $table->bigInteger('working_company')->unsigned();
            $table->bigInteger('scope_id')->unsigned();
            $table->string('mobile')->unique()->nullable();;
            $table->string('designation');
            $table->integer('spoc')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
            $table->foreign('work_station')->references('id')->on('location_generals')->onDelete('cascade');
            $table->foreign('scope_id')->references('id')->on('supportscopes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
