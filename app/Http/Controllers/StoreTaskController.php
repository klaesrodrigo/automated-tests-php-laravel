<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Services\TaskServiceContract;
use Illuminate\Http\Response as HttpResponse;

class StoreTaskController extends Controller
{
    private $taskService;

    public function __construct(TaskServiceContract $taskService)
    {
        $this->taskService = $taskService;
    }

    public function __invoke(StoreTaskRequest $request)
    {
        //validate request
        $validated = $request->validated();

        $response = $this->taskService->createTask($request->all());
        return response()->json($response, HttpResponse::HTTP_CREATED);
    }
}
