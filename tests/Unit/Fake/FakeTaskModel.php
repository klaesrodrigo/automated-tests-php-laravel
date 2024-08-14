<?php

namespace Tests\Unit\Fake;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class FakeTaskModel extends Task {

    /**
     * Override the original all() method to return a custom collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function all($columns = ['*'])
    {
        return new Collection([
            new Task([
                'id' => 14,
                'name' => 'Task name fake 1',
                'description' => 'Task description',
                'completed' => false,
            ]),
            new Task([
                'id' => 21,
                'name' => 'Task name fake 2',
                'description' => 'Task description',
                'completed' => true,
            ]),
        ]);
    }
}