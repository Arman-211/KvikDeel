<?php

namespace App\Http\Services;

use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;


class TasksService
{
    /**
     * @var TaskRepositoryInterface
     */
    protected TaskRepositoryInterface $taskRepository;

    public function __construct(
        TaskRepositoryInterface $taskRepository
    )
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return Collection
     */
    public function getTasks(): Collection
    {
        return $this->taskRepository->getTasks();
    }

    /**
     * @param int $taskId
     * @return Task
     */
    public function getTask(int $taskId): Task
    {
        return $this->taskRepository->getTask($taskId);
    }

    /**
     * @param array $task
     * @return Task
     */
    public function createTask(array $task): Task
    {
        return $this->taskRepository->createTask($task);
    }

    /**
     * @param array $task
     * @param int $taskId
     * @return Task
     */
    public function updateTask(array $task, int $taskId, ): Task
    {
        return $this->taskRepository->updateTask($task, $taskId );
    }

    /**
     * @param int $taskId
     * @return string
     */
    public function deleteTask(int $taskId): string
    {
        return $this->taskRepository->deleteTask($taskId);
    }
}
