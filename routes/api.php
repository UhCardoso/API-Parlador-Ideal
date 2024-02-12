<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);
Route::post('/login', [AuthController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function () {
    // users routes only logged in
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::patch('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // posts routes only logged in
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts/{id}/store', [PostController::class, 'store']);
    Route::patch('/posts/{user}/update/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{userId}/delete/{id}', [PostController::class, 'destroy']);
});