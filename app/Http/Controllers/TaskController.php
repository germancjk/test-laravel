<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Task, TaskRelCategory };

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'categories' => ['required', 'json'],
        ]);

        $task = Task::create([
            'name' => $validatedData['name'],
        ]);

        $categoriesArray = \json_decode($validatedData['categories'], true);

        foreach ($categoriesArray as $category) {
            $taskRelCategory = TaskRelCategory::create([
                'task_id' => $task->id,
                'category_id' => (int) $category,
            ]);
        }

        return response()->json([
            'status' => true,
            'code' => 201,
            'message'=> 'Task created',
        ]);
    }

    public function tasks()
    {
        $tasks = Task::with('categories')->get();

        return response()->json([
            'status' => true,
            'code' => 200,
            'data'=> $tasks,
        ]);
    }

}
