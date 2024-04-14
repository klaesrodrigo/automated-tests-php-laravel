<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceContract;

class IndexTaskController extends Controller
{
    private $taskService;

    public function __construct(TaskServiceContract $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke()
    {
        $response = $this->taskService->getAll();
        return response()->json($response);
    }
}
