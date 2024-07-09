<?php

namespace App\Repositories;

use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @param int $taskId
     * @return Task
     */
    public function getTask(int $taskId): Task
    {
        return Task::findOrFail($taskId);

    }

    /**
     * @return Collection
     */
    public function getTasks(): Collection
    {
        return Task::get();
    }

    /**
     * @param array $task
     * @return Task
     */
    public function createTask(array $task): Task
    {
        return  Task::create($task);
    }

    /**
     * @param array $data
     * @param int $id
     * @return Task
     */
    public function updateTask(array $data, int $id): Task
    {
        $task = Task::findOrFail($id);

        $task->update($data);

        return $task;
    }

    /**
     * @param int $taskId
     * @return string
     */
    public function deleteTask(int $taskId): string
    {
        try {
            $task = Task::query()
                ->where('id', $taskId)
                ->first();

            $task->delete();

            return 'Task deleted successfully';

        }catch (Exception $exception){
            Log::error($exception->getMessage());

            return 'Task deleted successfully';
        }


    }
}
