<?php

namespace App\Services;

use App\Models\Task;

class TaskService implements TaskServiceContract
{
    public function createTask(array $data): Task
    {
        return Task::create($data);
    }

    public function getAll()
    {
        return Task::all();
    }

    public function toggle(int $id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();
        return $task;
    }
}