<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('tag_id');
        });

        Schema::table('tag_task', function (Blueprint $table) {
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_task', function (Blueprint $table) {
            $table->dropForeign(['task_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::dropIfExists('tag_task');
    }
}
