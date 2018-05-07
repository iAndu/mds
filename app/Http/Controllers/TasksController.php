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

    /**
     * Display the specified resource.
     *
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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
                $tasksByProjects[$project->id]['project'] = $project;
                $tasksByProjects[$project->id]['tasks'][$task->id] = $task;
                //$tasksByProjects[$project->id]['users'] = $project->users;
                //pe aceeasi idee, trebuie in 'users' sa stim toti userii din proiect, dar
                //sa stim si la ce task-uri este implicat, astfel incat in tasks.all sa stim care sa fie bifati initial
            }
        }
        //dd($tasksByProjects);
        return view('tasks.all', compact('tasksByProjects'));
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
}
