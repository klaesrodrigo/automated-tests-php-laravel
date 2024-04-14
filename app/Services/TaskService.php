<?php

namespace App\Services;

use App\Models\Task;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

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

    public function arquive(int $id)
    {
        $canArquive = $this->validateIfTaskCanBeArquived($id);
        
        if (!$canArquive) {
            return throw new BadRequestException('Task cannot be arquived', 400);
        }
        
        Task::where('id', $id)->update(['archived_at' => now()]);
    }

    public function validateIfTaskCanBeArquived(int $id)
    {
        $task = Task::findOrFail($id);
        if ($task->completed) {
            return true;
        }
        return false;
    }
}