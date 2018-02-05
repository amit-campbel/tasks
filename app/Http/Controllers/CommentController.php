<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function index(Request $request, Task $task)
    {
    	return $task->comments;
    }

    public function show(Comment $comment, Task $task)
    {
        return $comment;
    }

    public function store(Request $request, Task $task)
    {
        $details = $request->all();

        $details['task_id'] = $task->id;
    	$details['created_by'] = Auth::guard('api')->user()->id;
    	$details['updated_by'] = Auth::guard('api')->user()->id;

        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    public function update(Request $request, Task $task, Comment $comment)
    {
    	if ($comment->checkEditAccess(Auth::guard('api')->user())) {
    		$details = $request->all();

    		$details['task_id'] = $task->id;
    		$details['updated_by'] = Auth::guard('api')->user()->id;

        	$comment->update($details);
        } else {
        	return response()->json(['error' => 'You dont have enough access to edit this Comment'], 403);
        }

        return response()->json($comment, 200);
    }

    public function delete(Comment $comment, Task $task)
    {
        $comment->delete();

        return response()->json(null, 204);
    }
}
