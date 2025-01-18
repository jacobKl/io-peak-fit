<?php

namespace App\Interfaces\Http\Controllers;

use App\Domain\Workout\Models\Workout;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkoutExerciseController extends Controller
{
    public function store(Request $request,Workout $workout) {
        return to_route('workout.show',['workout' => $workout->id]);
    }
}
