<?php

use App\Http\Controllers\Api\LifeHubController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('todo', TodoController::class);
Route::apiResource('lifehub', LifeHubController::class);