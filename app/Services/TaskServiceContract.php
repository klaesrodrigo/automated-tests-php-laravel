<?php

namespace App\Services;

interface TaskServiceContract
{
    public function createTask(array $data);

    public function getAll();

    public function toggle(int $id);

    public function arquive(int $id);
}