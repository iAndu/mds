<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Group;
use Illuminate\Support\Facades\Storage;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {
        $groups = Group::all();
        return view('groups.index', compact('groups', 'group_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {
        return view('groups.create', compact('group_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('avatar');

        $photo_path = 'public/group_avatars/default.jpg';

        if($photo) 
        {
            $photo_path = $request->file('avatar')->store('public/group_avatars');
        }

        $photo_path = 'storage/' . substr($photo_path, strpos($photo_path, '/') + 1);

        $group = Group::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'group_avatar' => $photo_path
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Group created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function change(Request $request, $group_id)
    {
        $groups = Group::all();
        if($request->has('new_group'))
            $group_id = $request->input('new_group');
        return view('groups.change', compact('groups', 'group_id'));
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
