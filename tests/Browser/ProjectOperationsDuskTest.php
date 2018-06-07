<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\Project;

class ProjectOperationsDuskTest extends DuskTestCase
{
    private $userId = 11;

    public function testGet()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find($this->userId))
                    ->visit('/projects/create')
                    ->assertSee('Create project')
                    ->assertSee('Name:')
                    ->assertSee('Group:')
                    ->assertSee('Project avatar:');
        });
    }

    //don't need to login again, first loginAs holds a session for all functions in this file
    public function testCreateAndDelete()
    {
        $this->browse(function (Browser $browser) {
            //create
            $browser->visit('/projects/create')
                    ->assertSee('Create project')
                    ->assertSee('Name:')
                    ->type('name', '_TEST_PROJECT_NAME_')
                    ->assertSee('Group:')
                    ->select('group_id') //selects a random option if not specifying second parameter which is the value
                    ->assertSee('Project avatar:')
                    //->attach('avatar', '../../storage/app/public/project_avatars/default.png')
                    ->press('submitBtn')
                    ->assertSee('{"status":"success","message":"Project created successfully."}');

            //delete
            //need to first delete from projects_role_user
            //would be better if we used ON DELETE CASCADE
            Project::where('name', '_TEST_PROJECT_NAME_')->delete();
        });
    }
}
