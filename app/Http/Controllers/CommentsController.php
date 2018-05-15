<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use Auth;
use Carbon\Carbon;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = Comment::create([
            'task_id' => $request->task_id,
            'user_id' => $request->user_id,
            'content' => $request->content
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Comment created successfully'
        ]);
    }
}
