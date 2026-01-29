<?php

use Illuminate\Support\Facades\Route;


Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/submit-register', [App\Http\Controllers\AuthController::class, 'submitRegister'])->name('submit-register');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/submit-login', [App\Http\Controllers\AuthController::class, 'submitLogin'])->name('submit-login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');


Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions/store', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/show/{id}', [App\Http\Controllers\QuestionController::class, 'show'])->name('questions.show');
Route::get('/questions/{id}/edit', [App\Http\Controllers\QuestionController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'update'])->name('questions.update');
Route::delete('/questions/{id}', [App\Http\Controllers\QuestionController::class, 'destroy'])->name('questions.destroy');

Route::get('/reponses', [App\Http\Controllers\ReponseController::class, 'index'])->name('reponses.index');
Route::get('/reponses/create', [App\Http\Controllers\ReponseController::class, 'create'])->name('reponses.create');
Route::post('/reponses/store', [App\Http\Controllers\ReponseController::class, 'store'])->name('reponses.store');
Route::get('/reponses/show/{id}', [App\Http\Controllers\ReponseController::class, 'show'])->name('reponses.show');
Route::get('/reponses/{id}/edit', [App\Http\Controllers\ReponseController::class, 'edit'])->name('reponses.edit');
Route::put('/reponses/{id}', [App\Http\Controllers\ReponseController::class, 'update'])->name('reponses.update');
Route::delete('/reponses/{id}', [App\Http\Controllers\ReponseController::class, 'destroy'])->name('reponses.destroy');

Route::get('/favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
Route::get('/favorites/create', [App\Http\Controllers\FavoriteController::class, 'create'])->name('favorites.create');
Route::post('/favorites/store', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorites.store');
Route::get('/favorites/show/{id}', [App\Http\Controllers\FavoriteController::class, 'show'])->name('favorites.show');
Route::get('/favorites/{id}/edit', [App\Http\Controllers\FavoriteController::class, 'edit'])->name('favorites.edit');
Route::put('/favorites/{id}', [App\Http\Controllers\FavoriteController::class, 'update'])->name('favorites.update');
Route::delete('/favorites/{id}', [App\Http\Controllers\FavoriteController::class, 'destroy'])->name('favorites.destroy');


Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::delete('/admin/questions/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.questions.destroy');