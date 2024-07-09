<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    /**
     * @param int $taskId
     * @return Task
     */
    public function getTask(int $taskId):Task;

    /**
     * @return Collection
     */
    public function getTasks(): Collection;

    /**
     * @param array $task
     * @return Task
     */
    public function createTask(array $task):Task;

    /**
     * @param array $data
     * @param int $taskId
     * @return Task
     */
    public function updateTask(array $data, int $taskId):Task;

    /**
     * @param int $taskId
     * @return string
     */
    public function deleteTask(int $taskId):string;


}
