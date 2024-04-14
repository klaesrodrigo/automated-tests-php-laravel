<?php

namespace Tests\Feature;

use Tests\TestCase;

class StoreTaskTest extends TestCase
{
    public function testStoreTask()
    {
        $response = $this->postJson('/api/tasks', [
            'name' => 'Task 1',
            'description' => 'Description 1',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'Task 1',
                'description' => 'Description 1',
            ]);
    }
}