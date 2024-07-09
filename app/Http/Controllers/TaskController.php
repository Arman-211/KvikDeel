<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksStoreRequest;
use App\Http\Requests\TasksUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Http\Services\TasksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class TaskController extends Controller
{

    protected TasksService $tasksService;

    public function __construct(
        TasksService $tasksService
    )
    {
        $this->tasksService = $tasksService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $tasks = $this->tasksService->getTasks();

        return TaskResource::collection($tasks);
    }

    /**
     * @param TasksStoreRequest $request
     * @return TaskResource
     */
    public function store(TasksStoreRequest $request): TaskResource
    {
        $task = $this->tasksService->createTask($request->all());

        return new TaskResource($task);

    }

    /**
     * @param $id
     * @return TaskResource
     */
    public function show($id): TaskResource
    {
        $task = $this->tasksService->getTask($id);

        return new TaskResource($task);
    }

    /**
     * @param TasksUpdateRequest $request
     * @return TaskResource
     */
    public function update(TasksUpdateRequest $request): TaskResource
    {
        $task = $this->tasksService->updateTask($request->all(),$request->id);

        return new TaskResource($task);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response()->json([
            'message' => $this->tasksService->deleteTask($id)
        ]);
    }
}
