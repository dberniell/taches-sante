<?php
// api/src/Controller/ReadUserTasks.php

namespace App\Controller;

use App\Entity\User;
use App\Repository\TaskRepository;

class ReadUserTasks
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function __invoke(User $data): array
    {
        $tasks = $this->taskRepository->getTasksOfUser($data);

        return $tasks;
    }
}
