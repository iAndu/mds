<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;
use \App\Task;

class TaskOperationsDuskTest extends DuskTestCase
{
    private $userId = 11;

    public function testGet()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find($this->userId))
                    ->visit('/tasks/create')
                    ->assertSee('Create task')
                    ->assertSee('Title')
                    ->assertSee('Description')
                    ->assertSee('Deadline')
                    ->assertSee('Project')
                    ->assertSee('Priority')
                    ->assertSee('Subtasks');
        });
    }

    //don't need to login again, first loginAs holds a session for all functions in this file
    public function testCreateAndDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find($this->userId))
                    ->visit('/tasks/create')
                    ->assertSee('Create task')
                    ->assertSee('Title')
                    ->type('name', '_TEST_TASK_TITLE_')
                    ->assertSee('Description')
                    ->type('description', '_TEST_TASK_DESCRIPTION_')
                    ->assertSee('Deadline') //don't set the deadline because it's too complicated this way
                    ->assertSee('Project')
                    ->select('project_id') //random
                    ->assertSee('Priority')
                    ->select('priority') //random
                    ->assertSee('Subtasks') //don't set subtasks now
                    ->press('submitBtn')
                    ->assertSee('{"status":"success","message":"Task created successfully"}');
        });

        //delete
        Task::where('title', '_TEST_TASK_TITLE_')->delete();
    }

    public function testChangePriority()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find($this->userId);
            $projects = $user->projects;
            $tasks = $user->tasks;

            foreach($projects as $project)
            {
                $browser->loginAs($user)
                        ->visit('/tasks/all')
                        ->assertSee($project->name);
            }

            $taskIds = [];
            foreach($tasks as $task)
            {
                $browser->loginAs($user)
                        ->visit('/tasks/all'); //mine
                        //->assertSee($task->title); //will uncomment once /tasks/mine is done

                array_push($taskIds, $task->id);
            }

            $idTest = $taskIds[array_rand($taskIds)];
            $priorities = ['low', 'normal', 'high', 'urgent'];
            $chosenPriority = $priorities[array_rand($priorities)];

            $task = Task::find($idTest);
            $lastPriority = $task->priority;
            $task->priority = $chosenPriority;
            $task->save();

            $oldTask = Task::find($idTest);
            $this->assertTrue($oldTask->priority == $chosenPriority);
            $oldTask->priority = $lastPriority;
            $oldTask->save();

            $finalTaskCheck = Task::find($idTest);
            $this->assertTrue($finalTaskCheck->priority == $lastPriority);

            //if we got here, everything is good
        });
    }

    public function testAssignUsers()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find($this->userId);
            $projects = $user->projects;
            $tasks = $user->tasks;

            foreach($projects as $project)
            {
                $browser->loginAs($user)
                        ->visit('/tasks/all')
                        ->assertSee($project->name);
            }

            $taskIds = [];
            foreach($tasks as $task)
            {
                $browser->loginAs($user)
                        ->visit('/tasks/all'); //mine
                //->assertSee($task->title); //will uncomment once /tasks/mine is done

                array_push($taskIds, $task->id);
            }

            $idTest = $taskIds[array_rand($taskIds)];
            //if we got here, everything is good
        });
    }
}
