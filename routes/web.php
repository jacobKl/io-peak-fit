<?php

use App\Interfaces\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'create']);
// Route::post('/', [WorkoutController::class, 'store'])->name();
