<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ReponseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Public routes
Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/questions/{id}', [QuestionController::class, 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $r) => $r->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/questions', [QuestionController::class, 'store']);
    Route::put('/questions/{id}', [QuestionController::class, 'update']);
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy']);

    Route::post('/reponses', [ReponseController::class, 'store']);
    Route::delete('/reponses/{id}', [ReponseController::class, 'destroy']);
});