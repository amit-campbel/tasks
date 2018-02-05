<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
    	return Task::all();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        $details = $request->all();

    	$details['created_by'] = Auth::guard('api')->user()->id;
    	$details['updated_by'] = Auth::guard('api')->user()->id;

        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
    	if ($task->checkEditAccess(Auth::guard('api')->user())) {
    		$details = $request->all();

    		$details['updated_by'] = Auth::guard('api')->user()->id;

        	$task->update($details);
        } else {
        	return response()->json(['error' => 'You dont have enough access to edit this Task'], 403);
        }

        return response()->json($task, 200);
    }

    public function delete(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
