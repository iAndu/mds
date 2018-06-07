<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_role_user', function (Blueprint $table) {
            $table->dropForeign('project_role_user_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dropForeign('project_role_user_role_id_foreign');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->dropForeign('project_role_user_project_id_foreign');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');           
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->dropForeign('tasks_task_id_foreign');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_task_id_foreign');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->dropForeign('comments_user_id_foreign'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
        });

        Schema::table('task_user', function (Blueprint $table) {
            $table->dropForeign('task_user_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dropForeign('task_user_task_id_foreign');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_role_user', function (Blueprint $table) {
            $table->dropForeign('project_role_user_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign('project_role_user_role_id_foreign');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->dropForeign('project_role_user_project_id_foreign');
            $table->foreign('project_id')->references('id')->on('projects');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_project_id_foreign');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->dropForeign('tasks_task_id_foreign');
            $table->foreign('task_id')->references('id')->on('tasks');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_task_id_foreign');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->dropForeign('comments_user_id_foreign'); 
            $table->foreign('user_id')->references('id')->on('users');            
        });

        Schema::table('task_user', function (Blueprint $table) {
            $table->dropForeign('task_user_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign('task_user_task_id_foreign');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }
}
