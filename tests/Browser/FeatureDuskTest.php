<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\Task;
use \App\Project;
use \App\Group;

class FeatureDuskTest extends DuskTestCase
{
    private $userId = 11;

    /**
     * Steps :
     * 1. Create group
     * 2. Create project
     * 3. Create task
     * 4. Assign task
     * 5. Checks
     * 6. Deletes
     */
    public function testDemo()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find($this->userId);

            //1. Create group
            $browser->loginAs($user)
                    ->visit('/groups/create')
                    ->assertSee('Create group')
                    ->assertSee('Name:')
                    ->type('name', '_TEST_GROUP_NAME_')
                    ->assertSee('Your avatar:')
                    //->attach('avatar', '../../storage/app/public/project_avatars/default.png')
                    ->press('submitBtn')
                    ->assertSee('{"status":"success","message":"Group created successfully"}');

            //2. Create project
            $group = (Group::where('name', '_TEST_GROUP_NAME_')->get())[0];
            $browser->loginAs($user)
                    ->visit('/projects/create')
                    ->assertSee('Create project')
                    ->assertSee('Name:')
                    ->type('name', '_TEST_PROJECT_NAME_')
                    ->assertSee('Group:')
                    ->select('group_id', $group->id)
                    ->assertSee('Project avatar:')
            //->attach('avatar', '../../storage/app/public/project_avatars/default.png')
                    ->press('submitBtn')
                    ->assertSee('{"status":"success","message":"Project created successfully."}');

            //3. Create task
            $project = (Project::where('name', '_TEST_PROJECT_NAME_')->get())[0];
            $browser->loginAs($user)
                    ->visit('/tasks/create')
                    ->assertSee('Create task')
                    ->assertSee('Title')
                    ->type('name', '_TEST_TASK_TITLE_')
                    ->assertSee('Description')
                    ->type('description', '_TEST_TASK_DESCRIPTION_')
                    ->assertSee('Deadline') //don't set the deadline because it's too complicated this way
                    ->assertSee('Project')
                    ->select('project_id', $project->id) //random
                    ->assertSee('Priority')
                    ->select('priority') //random
                    ->assertSee('Subtasks') //don't set subtasks now
                    ->press('submitBtn')
                    ->assertSee('{"status":"success","message":"Task created successfully"}');

            //4. Assign task
            $task = (Task::where('title', '_TEST_TASK_TITLE_')->get())[0];
            $testUser = factory(User::class)->make();
            $task->users()->attach($testUser->id);

            //5. Checks

            //6. Deletes
            //delete task
            //the user will automatically get deleted
            Task::where('title', '_TEST_TASK_TITLE_')->delete();
            //delete project
            Project::where('name', '_TEST_PROJECT_NAME_')->delete();
            //delete group
            Group::where('name', '_TEST_GROUP_NAME_')->delete();
        });
    }
}
