<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceContract;
use Illuminate\Http\Request;

class ToggleTaskController extends Controller
{
    private $taskService;

    public function __construct(TaskServiceContract $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke($id)
    {;
        $response = $this->taskService->toggle($id);
        return response()->json($response);
    }
}
