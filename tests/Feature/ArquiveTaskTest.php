<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Services\TaskServiceContract;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArquiveTaskTest extends TestCase
{
    use RefreshDatabase; 
    
    private $taskCompleted;
    private $task;

    public function setUp(): void
    {
        parent::setUp();

        $this->taskCompleted = Task::factory()->state([ 'completed' => true ])->create();
        $this->task = Task::factory()->create();
    }

    public function testArquiveTask()
    {
        $taskId = $this->taskCompleted->id;
        $response = $this->patchJson("/api/tasks/arquive/{$taskId}");

        $response->assertStatus(204);
    }

    public function testThrowExceptionWhenArquiveTask()
    {
        $taskId = $this->task->id;
        $response = $this->patchJson("/api/tasks/arquive/{$taskId}");

        $response->assertBadRequest();
    }
}