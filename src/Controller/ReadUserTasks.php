<?php
// api/src/Controller/ReadUserTasks.php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Task;
use App\Repository\TaskRepository;
use Doctrine\Common\Collections\Collection;

class ReadUserTasks
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function __invoke(User $data): Collection
    {
        $tasks = $this->taskRepository->getTasksOfUser($data);

        return $tasks;
    }
}
