<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Group;
use App\Project;
use App\User;
use App\Role;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Auth::user()->projects;
        $users = User::all();

        return view('projects.index', compact('projects', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Auth::user()->groups()->get();

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
        // In case project manager role doesn't exist for some reason, abort
        $pm = Role::where('name', 'project-manager')->first();

        if (!$pm) {
            abort(500);
        }

        if ($request->avatar) {
            $path = $request->file('avatar')->store('public/project_avatars');
        } else {
            $path = 'public/project_avatars/default.png';
        }

        $path = 'storage/' . substr($path, strpos($path, '/') + 1);

        $project = Project::create([
            'name' => $request->name,
            'group_id' => $request->group_id,
            'avatar' => $path
        ]);

        Auth::user()->projects()->attach([$project->id => ['role_id' => $pm->id]]);

        return response()->json([
            'status' => 'success',
            'message' => 'Project created successfully.'
        ]);
    }

    public function assign(Request $request)
    {
        $elements = $request->input('elements');
        $project = Project::find($request->input("project"));

        $project->users()->detach();
        $project->save();

        if($elements)
        {
            foreach($elements as $element)
            {
                $user_id = (int)$element;
                $project->users()->attach($user_id);
                //$task->save();
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Users successfully assigned to project'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Project  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
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
