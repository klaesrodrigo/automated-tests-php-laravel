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

    public function arquive(int $id)
    {
        $canArquive = $this->validateIfTaskCanBeArquived($id);
        
        if (!$canArquive) {
            return response()->json(['message' => 'Task must be completed to be arquived'], 400);
        }
        
        $task = Task::where('id', $id)->update(['arquived' => true]);

        return $task;
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