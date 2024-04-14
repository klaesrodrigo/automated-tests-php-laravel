<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceContract;
use Illuminate\Http\Request;

class StoreTaskController extends Controller
{
    private $taskService;

    public function __construct(TaskServiceContract $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(Request $request)
    {
        $response = $this->taskService->createTask($request->all());
        return response()->json($response);
    }
}
