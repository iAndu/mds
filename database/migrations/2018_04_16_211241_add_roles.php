<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Role;

class AddRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert([
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'Simple user.'
            ], [
                'name' => 'project-manager',
                'display_name' => 'Project manager',
                'description' => 'Manager of a project.'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Role::where('name', 'user')->orWhere('name', 'project-manager')->delete();
    }
}
