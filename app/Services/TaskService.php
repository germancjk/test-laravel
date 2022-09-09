<?php

namespace App\Services;

use App\Models\{ Task, TaskRelCategory };
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function createTask(string $taskName): Task
    {
        return Task::create([
            'name' => $taskName,
        ]);
    }

    public function createTaskCategories(Task $task, array $taskCategories)
    {
        return $task->categories()->attach($taskCategories);
    }

    public function getTasks()
    {
        $results = DB::table('tasks')
            ->leftJoin('task_rel_categories', 'tasks.id', '=', 'task_rel_categories.task_id')
            ->leftJoin('categories', 'task_rel_categories.category_id', '=', 'categories.id')
            ->select('tasks.id as task_id', 'tasks.name as task_name', 'categories.name as category_name')
            ->get()
            ->toArray();
        
        return $this->formatGetTasks($results);
    }

    public function formatGetTasks($tasks)
    {
        $buffer = [];

        foreach ($tasks as $task) {

            $key = array_search($task->task_id, array_column($buffer, 'id'));

            if(false===$key){
                $buffer[] = [
                    'id' => $task->task_id,
                    'name' => $task->task_name,
                    'categories' => [
                        ['name' => $task->category_name],
                    ],
                ];
            } else {
                $buffer[$key]['categories'][] = [
                    'name' => $task->category_name,
                ];
            }
        }

        return $buffer;
    }

    public function deleteTask(int $id): bool
    {
        $task = Task::find($id);
 
        return $task->delete();
    }
}