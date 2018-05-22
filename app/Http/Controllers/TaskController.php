<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Task\TaskResource;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Resources\Task\TaskCollection;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }


    public function index()
    {
        //return response()->json([
            return TaskResource::collection(Task::paginate(20));
    //    ], Response::HTTP_OK);
    }


    public function show(Task $task)
    {
        //return  $task;
        return response()->json([
            'data' => new TaskResource($task)
        ], Response::HTTP_OK);
    }

    public function store(ProductRequest $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->body = $request->body;
        $task->save();
        return response()->json([
            'data' => $task
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json([
            'data' => new TaskResource($task)
        ], Response::HTTP_CREATED);
        
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json([
            'data' => $task
        ], Response::HTTP_NO_CONTENT);
    }

}
