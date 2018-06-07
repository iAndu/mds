<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class ChangePriority extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('priority');
            
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->enum('priority', ['low', 'normal', 'high', 'urgent']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('priority');
            
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->enum('priority', ['low', 'medium', 'high']);
        });
    }
}
