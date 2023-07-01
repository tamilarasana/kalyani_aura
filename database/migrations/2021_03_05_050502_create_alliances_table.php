<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alliances', function (Blueprint $table) {
            $table->id();
            $table->string('alligns_title')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('your_image')->nullable();
            $table->bigInteger('category')->unsigned();
            $table->string('coupen_code')->nullable();
            $table->string('email')->nullable();
            $table->string('weburl')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('country')->unsigned();
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
        Schema::dropIfExists('alliances');
    }
}
