<?php

namespace App\Http\Controllers;

use App\Services\TaskServiceContract;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

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
        return response()->json($response, HttpResponse::HTTP_CREATED);
    }
}
