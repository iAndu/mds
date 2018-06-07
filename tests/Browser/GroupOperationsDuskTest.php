<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\Group;

class ExampleTest extends DuskTestCase
{
    private $userId = 11;

    public function testGet()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find($this->userId))
                    ->visit('/groups/create')
                    ->assertSee('Create group')
                    ->assertSee('Name:')
                    ->assertSee('Your avatar:');
        });
    }

    //don't need to login again, first loginAs holds a session for all functions in this file
    public function testCreateAndDelete()
    {
        $this->browse(function (Browser $browser) {
            //create
            $browser->visit('/groups/create')
                    ->assertSee('Create group')
                    ->assertSee('Name:')
                    ->type('name', '_TEST_GROUP_NAME_')
                    ->assertSee('Your avatar:')
                    //->attach('avatar', '../../storage/app/public/project_avatars/default.png')
                    ->press('submitBtn')
                    ->assertSee('{"status":"success","message":"Group created successfully"}');

            //delete
            Group::where('name', '_TEST_GROUP_NAME_')->delete();
        });
    }
}
