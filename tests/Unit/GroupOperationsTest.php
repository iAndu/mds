<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GroupOperationsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGet()
    {
        //get response
        $response = $this->get('/groups/create');

        //check status
        $response->assertStatus(302);
    }

    /*
    public function testCreate()
    {
        $response = $this->json('POST', '/groups/create',
            ['name' => '_TEST_GROUP_NAME_']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);

    }
    */
}
