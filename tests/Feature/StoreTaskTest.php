<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreTaskTest extends TestCase
{
    
    use RefreshDatabase; 

    public function testStoreTask()
    {
        $name = 'Task 1';
        $description = 'Description 1';

        $response = $this->postJson('/api/tasks', [
            'name' => $name,
            'description' => $description,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'name' => $name,
                'description' => $description,
            ]);
    }

    public function testStoreTaskAndCheckIfItWasSaved()
    {
        $name = 'Task 2';
        $description = 'Description 2';

        $response = $this->postJson('/api/tasks', [
            'name' => $name,
            'description' => $description,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'name' => $name,
                'description' => $description,
            ]);

        $task = $response->json();
        $this->assertDatabaseHas('tasks', [
            'id' => $task['id'],
            'name' => $task['name'],
            'description' => $task['description'],
        ]);
    }

    public function testStoreTaskWithInvalidData()
    {
        $response = $this->postJson('/api/tasks', [
            'name' => '',
            'description' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'description']);
    }
}