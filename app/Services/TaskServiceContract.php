<?php

namespace App\Services;

interface TaskServiceContract
{
    public function createTask(array $data);

    public function getAll();
}