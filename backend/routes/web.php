<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return response()->json([
    'message' => 'API is running',
    'frontend_url' => config('app.frontend_url', 'http://localhost:5173')
  ]);
});