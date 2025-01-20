<?php

use App\Interfaces\Http\Controllers\MonthSummaryController;
use App\Interfaces\Http\Controllers\WorkoutController;
use App\Interfaces\Http\Controllers\WorkoutExerciseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WorkoutController::class, 'create'])->name('workout');
Route::post('/', [WorkoutController::class, 'store'])->name('workout.store');
Route::get('/workout/{workout}', [WorkoutController::class, 'show'])->name('workout.show');
Route::post('/workout/{workout}/store', [WorkoutExerciseController::class, 'store'])->name('exercise.store');
Route::delete('/workout/{workout}', [WorkoutController::class, 'delete'])->name('workout.delete');
Route::delete('/workout/{workout}/workout-exercise/{workoutExercise}', [WorkoutExerciseController::class, 'delete'])->name('workoutExercise.delete');
Route::get('/workout/{workout}/workout-exercise/{workoutExercise}', [WorkoutExerciseController::class, 'show'])->name('workoutExercise.show');
Route::post('/workout/{workout}/workout-exercise/{workoutExercise}/edit', [WorkoutExerciseController::class, 'edit'])->name('workoutExercise.edit');
Route::get('/month-summary', [MonthSummaryController::class, 'index'])->name('month-summary');
