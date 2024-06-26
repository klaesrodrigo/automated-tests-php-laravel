<?php

use App\Http\Controllers\ArquiveTaskController;
use App\Http\Controllers\IndexTaskController;
use App\Http\Controllers\StoreTaskController;
use App\Http\Controllers\ToggleTaskController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tasks', StoreTaskController::class);
Route::get('/tasks', IndexTaskController::class);
Route::post('/tasks/{id}', ToggleTaskController::class);
Route::patch('/tasks/arquive/{id}', ArquiveTaskController::class);
