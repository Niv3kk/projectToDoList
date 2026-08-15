<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $tags = Tag::withCount('tasks')
            ->orderBy('name')
            ->get();

        return TagResource::collection($tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create($request->validated());

        return (new TagResource($tag))
            ->additional([
                'message' => 'Etiqueta creada correctamente.',
            ])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag): TagResource
    {
        $tag->loadCount('tasks');

        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTagRequest $request,
        Tag $tag
    ): TagResource {
        $tag->update($request->validated());

        $tag->loadCount('tasks');

        return (new TagResource($tag))
            ->additional([
                'message' => 'Etiqueta actualizada correctamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag): JsonResponse
    {
        $tag->delete();

        return response()->json([
            'message' => 'Etiqueta eliminada correctamente.',
        ]);
    }
}
