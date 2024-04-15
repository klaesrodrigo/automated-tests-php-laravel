<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Services\TaskService;
use Mockery;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Tests\TestCase;

class TaskServiceTest extends TestCase
{
    private $taskFake;
    private $taskCompletedFake;

    public function setUp(): void
    {
        parent::setUp();

        $this->taskFake = new Task([
            'id' => 1,
            'name' => 'Task name',
            'description' => 'Task description',
            'completed' => false,
        ]); 
    
        $this->taskCompletedFake = new Task([
            'id' => 2,
            'name' => 'Task name',
            'description' => 'Task description',
            'completed' => true,
        ]);         
    }

    public function testCreateTask()
    {
        $task = [
            'name' => 'Task name',
            'description' => 'Task description',
        ];

        $taskModelMock = Mockery::mock(Task::class);
        $taskModelMock->shouldReceive('create')->once()->withArgs([$task])->andReturn($this->taskFake);

        $taskService = new TaskService($taskModelMock);

        $task = $taskService->createTask($task);

        $this->assertEquals($this->taskFake->id, $task->id);
    }

    public function testGetAll()
    {
        $dbResponse = [$this->taskFake, $this->taskCompletedFake];
        $taskModelMock = Mockery::mock(Task::class);
        $taskModelMock->shouldReceive('all')->once()->andReturn($dbResponse);
        
        $taskService = new TaskService($taskModelMock);
        
        $tasks = $taskService->getAll();
        
        $this->assertCount(count($dbResponse), $tasks);
    }
    
    public function testArquive()
    {
        $id = 1;

        $taskModelMock = Mockery::mock(Task::class);
        $taskModelMock->shouldReceive('findOrFail')->once()->withArgs([$id])->andReturn($this->taskCompletedFake);
        $taskModelMock->shouldReceive('where')->once()->withArgs(['id', $id])->andReturn($taskModelMock);
        $taskModelMock->shouldReceive('update')->once()->withAnyArgs()->andReturn();
        
        $taskService = new TaskService($taskModelMock);
        $taskService->arquive($id);
    }
    
    
    public function testThrowExceptionWhenArquiveTaskUncompleted()
    {   
        $id = 1;     
        $taskModelMock = Mockery::mock(Task::class);
        $taskModelMock->shouldReceive('findOrFail')->once()->withArgs([$id])->andReturn($this->taskFake);

        $this->expectException(BadRequestException::class);

        $taskService = new TaskService($taskModelMock);
        $taskService->arquive($id);
    }    
}