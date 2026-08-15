<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/prueba', function () {
    return response()->json([
        'mensaje'=> 'Mi API REST funciona correctamente',
    ] );
});

Route::apiResource('tasks', TaskController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('tags', TagController::class);