<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("name")->get();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->loadCount("tasks");
        return view("categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()
            ->route("categories.index")
            ->with("success", "Categoria actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->tasks()->exists()) {
            return redirect()
                ->route("categories.index")
                ->with(
                    "error",
                    "No se puede eliminar una categoria que tenga tarea asociada"
                );
        }

        $category->delete();
        return redirect()
        ->route("categories.index")
        ->with("success","Categoria eliminada correctamente");
    }
}
