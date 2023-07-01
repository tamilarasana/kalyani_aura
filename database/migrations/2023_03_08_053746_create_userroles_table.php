<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userroles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->nullable();
            $table->string('status')->nullable();
            $table->string('open_dashboard')->nullable();
            $table->string('open_visitor_log')->nullable();
            $table->string('add_visitor')->nullable();
            $table->string('view_visitor')->nullable();
            $table->string('edit_visitor')->nullable();
            $table->string('delete_visitor')->nullable();
            $table->string('open_visitor_timeline')->nullable();
            $table->string('open_reason_for_visit')->nullable();
            $table->string('add_reason')->nullable();
            $table->string('delete_reason')->nullable();
            $table->string('import_reason')->nullable();
            $table->string('export_reason')->nullable();
            $table->string('open_visitor_kiosk')->nullable();
            $table->string('open_user_page')->nullable();
            $table->string('add_user')->nullable();
            $table->string('edit_user')->nullable();
            $table->string('delete_user')->nullable();
            $table->string('open_user_role')->nullable();
            $table->string('add_role')->nullable();
            $table->string('edit_role')->nullable();
            $table->string('set_permission')->nullable();
            $table->string('delete_role')->nullable();
            $table->string('open_setting')->nullable();
            $table->string('update_setting')->nullable();
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
        Schema::dropIfExists('userroles');
    }
}
