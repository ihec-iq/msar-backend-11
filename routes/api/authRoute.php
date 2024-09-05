<?php

use App\Http\Controllers\Api\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->middleware(['locale', 'maintenance']);
Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum', 'locale', 'maintenance']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware(['auth:sanctum', 'locale', 'maintenance']);
