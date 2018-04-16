<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Group;
use App\Project;
use App\User;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Remove when auth is ready
        $projects = Project::all();
        // $projects = Auth::user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Remove when finished auth
        $groups = Group::all();
        // $groups = Auth::user()->groups;

        return view('projects.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        if ($request->avatar) {
            $path = $request->file('avatar')->store('public/project_avatars');
        } else {
            $path = 'public/project_avatars/default.png';
        }

        $project = Project::create([
            'name' => $request->name,
            'group_id' => $request->group_id,
            'avatar' => $path
        ]);

        // TODO: Add when finished auth
        // Auth::user()->projects()->attach($project->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Project created successfuly.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $id)
    {
        $project = $id;
        $users = $project->users;

        return view('projects.show', compact('project', 'users'));
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
