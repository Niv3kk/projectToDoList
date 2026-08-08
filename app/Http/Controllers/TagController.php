<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tags = Tag::withCount('tasks')
            ->orderBy('name')
            ->get();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("tags.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return redirect()
            ->route('tags.index')
            ->with('success', 'Etiqueta creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag): View
    {
        $tag->loadCount('tasks');

        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag): View
    {
        return view('tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTagRequest $request,
        Tag $tag
    ): RedirectResponse {
        $tag->update($request->validated());

        return redirect()
            ->route('tags.index')
            ->with('success', 'Etiqueta actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()
            ->route('tags.index')
            ->with('success', 'Etiqueta eliminada correctamente.');
    }
}
