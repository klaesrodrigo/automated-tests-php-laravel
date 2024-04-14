<?php

namespace App\Services;

use App\Models\Task;

class TaskService implements TaskServiceContract
{
    public function createTask(array $data): Task
    {
        return Task::create($data);
    }
}