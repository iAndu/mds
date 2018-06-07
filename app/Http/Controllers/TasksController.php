<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Auth;
use Carbon\Carbon;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Auth::user()->projects()->get();

        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->name,
            'description' => $request->description,
            'deadline' => Carbon::parse($request->deadline),
            'priority' => $request->priority,
            'project_id' => $request->project_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Task created successfully'
        ]);
    }

    //check/uncheck a subtask
    public function toggleSubtask(Request $request)
    {
        $task = Task::find($request->input("task"));
        $task->finished = 1 - $task->finished;
        $task->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function all()
    {
        $projects = Auth::user()->projects()->get();
        $tasksByProjects = [];

        foreach($projects as $project)
        {
            foreach($project->tasks as $task)
            {
                //only main tasks have task_id null
                if($task->task_id == null)
                {
                    $tasksByProjects[$project->id]['project'] = $project;
                    $tasksByProjects[$project->id]['tasks'][$task->id]['task'] = $task;
                    //this can probably be done with $task->users, but now it's not working
                    foreach ($project->users as $user) {
                        $tasksByProjects[$project->id]['tasks'][$task->id]['usersWithAssigned'][$user->id]['user'] = $user;
                        $isAssigned = false;
                        foreach ($user->tasks as $taskOfUser) {
                            if ($taskOfUser->id == $task->id) {
                                $isAssigned = true;
                                break;
                            }
                        }
                        $tasksByProjects[$project->id]['tasks'][$task->id]['usersWithAssigned'][$user->id]['isAssigned'] = $isAssigned;
                    }

                    foreach ($task->subTasks as $subTask) {
                        $tasksByProjects[$project->id]['tasks'][$task->id]['subTasks'][$subTask->id] = $subTask;
                    }
                }
            }
        }

        //utilities
        $priorityToStyle['low'] = 'primary';
        $priorityToStyle['normal'] = 'info';
        $priorityToStyle['high'] = 'warning';
        $priorityToStyle['urgent'] = 'danger';

        //dd($tasksByProjects);
        return view('tasks.all', compact('tasksByProjects', 'priorityToStyle'));
    }

    public function assign(Request $request)
    {
        $elements = $request->input('elements');
        $task = Task::find($request->input("task"));

        $task->users()->detach();
        $task->save();

        if($elements)
        {
            foreach($elements as $element)
            {
                $user_id = substr($element, strlen('assignedUser'));
                $task->users()->attach($user_id);
                //$task->save();
            }
        }

    }

    public function changePriority(Request $request)
    {
        $task = Task::find($request->input("task"));
        $task->priority = $request->input("priority");
        $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function assign(Request $request, Task $task)
    {
        $task->users()->attach($request->users);

        return response()->json([
            'status' => 'success',
            'message' => 'Project created successfuly.'
        ]);
    }
}
