<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;

class ExampleTest extends DuskTestCase
{
    private $userId = 11;

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find($this->userId))
                    ->visit('/groups/create')
                    ->assertSee('Your avatar:');
        });
    }
}
