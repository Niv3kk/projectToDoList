<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])
            ->orderByDesc('id')
            ->get();

        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        $tagIds = $validated['tags'];

        unset($validated['tags']);

        $task = DB::transaction(function () use ($validated, $tagIds) {
            $task = Task::create($validated);

            $task->tags()->sync($tagIds);

            return $task;
        });

        $task->load(['category', 'tags']);

        return (new TaskResource($task))
            ->additional([
                'message' => 'Tarea creada correctamente.',
            ])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load(['category', 'tags']);

        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();

        $tagIds = $validated['tags'];

        unset($validated['tags']);

        DB::transaction(function () use ($task, $validated, $tagIds) {
            $task->update($validated);

            $task->tags()->sync($tagIds);
        });

        $task->load(['category', 'tags']);

        return (new TaskResource($task))
            ->additional([
                'message' => 'Tarea actualizada correctamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada correctamente.'
        ]);
    }
}
