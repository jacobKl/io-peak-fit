<?php

use App\Interfaces\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::post('/workout', [WorkoutController::class, 'store']);
Route::get('/workout/{id}', [WorkoutController::class, 'getWorkout']);
