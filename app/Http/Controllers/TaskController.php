<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request, TaskService $taskService)
    {
        $validatedData = $request->validated();

        $task = $taskService->createTask($validatedData['name']);

        $categoriesArray = \json_decode($validatedData['categories'], true);
        $categories = $taskService->createTaskCategories($task, $categoriesArray);

        return response()->json([
            'status' => true,
            'code' => 201,
            'message'=> 'Task created',
        ]);
    }

    public function tasks(TaskService $taskService)
    {
        return response()->json([
            'status' => true,
            'code' => 200,
            'data'=> $taskService->getTasks(),
        ]);
    }

    public function destroy(int $id, TaskService $taskService)
    {
        $status = $taskService->deleteTask($id);

        return response()->json([
            'status' => $status,
            'code' => 200,
            'message' => $status ? 'Task Deleted' : 'Error Deleting Task'
        ]);
    }
}
