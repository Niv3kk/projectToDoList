<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::with(['category', 'tags'])
            ->orderByDesc('id')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view(
            'tasks.create',
            compact('categories', 'tags')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $tagIds = $validated['tags'];

        unset($validated['tags']);

        DB::transaction(function () use ($validated, $tagIds) {

            $task = Task::create($validated);

            $task->tags()->sync($tagIds);
        });

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        $task->load(['category', 'tags']);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $task->load('tags');

        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view(
            'tasks.edit',
            compact('task', 'categories', 'tags')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTaskRequest $request,
        Task $task
    ): RedirectResponse {

        $validated = $request->validated();

        $tagIds = $validated['tags'];

        unset($validated['tags']);

        DB::transaction(function () use ($task, $validated, $tagIds) {

            $task->update($validated);

            $task->tags()->sync($tagIds);
        });

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Tarea eliminada correctamente.');
    }
}
