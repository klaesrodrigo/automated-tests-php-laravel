<?php

namespace App\Services;

use App\Models\Task;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class TaskService implements TaskServiceContract
{
    private $taskModel;
    public function __construct(Task $taskModel)
    {
        $this->taskModel = $taskModel;
    }

    public function createTask(array $data): Task
    {
        return $this->taskModel::create($data);
    }

    public function getAll()
    {
        return $this->taskModel::all();
    }

    public function toggle(int $id)
    {
        $task = $this->taskModel::findOrFail($id);
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
        
        $this->taskModel::where('id', $id)->update(['archived_at' => now()]);
    }

    public function validateIfTaskCanBeArquived(int $id)
    {
        $task = $this->taskModel::findOrFail($id);
        if ($task->completed) {
            return true;
        }
        return false;
    }
}