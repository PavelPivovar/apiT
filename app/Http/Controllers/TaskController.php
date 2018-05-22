<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Task\TaskResource;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Resources\Task\TaskCollection;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }


    public function index()
    {
        return new TaskCollection(Task::all());
    }


    public function show(Task $task)
    {
        //return  $task;
        return new TaskResource($task);
    }

    public function store(ProductRequest $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
    }

    public function destroy(Task $task)
    {
        $task->delete();
    }

}
