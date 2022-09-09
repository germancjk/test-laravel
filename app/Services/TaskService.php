<?php

namespace App\Services;

use App\Models\{ Task, TaskRelCategory };

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
        $results = Task::leftJoin('task_rel_categories', 'tasks.id', '=', 'task_rel_categories.task_id')
            ->leftJoin('categories', 'task_rel_categories.category_id', '=', 'categories.id')
            ->select(
                'tasks.id as task_id',
                'tasks.name as task_name',
                'categories.name as category_name'
            )
            ->get()
            ->toArray();
        
        return $this->formatGetTasks($results);
    }

    public function formatGetTasks($tasks)
    {
        $buffer = [];

        foreach ($tasks as $task) {
            $buffer[$task['task_id']]['id'] = $task['task_id'];
            $buffer[$task['task_id']]['name'] = $task['task_name'];
            $buffer[$task['task_id']]['categories'][] = $task['category_name'];
        }

        return $buffer;
    }

    public function deleteTask(int $id): bool
    {
        $task = Task::find($id);
 
        return $task->delete();
    }
}