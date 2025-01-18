<?php

use App\Interfaces\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'create'])->name('workout');
Route::post('/', [WorkoutController::class, 'store'])->name('workout.store');
Route::get('/workout/{workout}', [WorkoutController::class, 'show'])->name('workout.show');