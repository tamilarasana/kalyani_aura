<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supportcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('category')->unique();
            $table->bigInteger('scope_id')->unsigned();
            $table->foreign('scope_id')->references('id')->on('supportscopes')->onDelete('cascade');
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
        Schema::dropIfExists('supportcategories');
    }
}
