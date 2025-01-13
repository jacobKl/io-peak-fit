<?php

use App\Interfaces\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::post('/workout', [WorkoutController::class, 'store']);
Route::get('/workout/{id}', [WorkoutController::class, 'getWorkout']);

// POST /workout "userId", "date", "name" -> obiekt workout { "id": ..., ... }
// Tworzenie treningu bez ćwiczeń

// $request->userId,
// $request->date,
// $request->name,

// -----

// POST /workout/{workout_id}/workout_excercise <- zwracane nowe ćwiczenie w workoucie ze wszystkimi polami
// Tworzenie ćwiczenia w treningu

// "excercise_id": "Bench press",
// "repetitions": 50,
// "sets": 100,
// "weight": 100

// -----

// GET /excercises lista cwiczen w bazie ->
// [
    // { id: 1, name: "Bench", type: "Typ cwiczenia" },
    // { id: 2, name: "Bench II", type: "Typ cwiczenia" },
// ]
