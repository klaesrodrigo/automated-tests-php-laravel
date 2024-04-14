<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceContract;

class ArquiveTaskController extends Controller
{
    private $taskService;

    public function __construct(TaskServiceContract $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke($id)
    {
        $this->taskService->arquive($id);

        return response()->json([], 204);
    }
}
