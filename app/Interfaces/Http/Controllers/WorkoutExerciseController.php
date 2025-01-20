<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Workout\DTOs\WorkoutExerciseDTO;
use App\Application\Workout\Services\WorkoutExerciseService;
use App\Domain\Workout\Models\Workout;
use App\Domain\Workout\Models\WorkoutExercise;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkoutExerciseController extends Controller
{
    public function __construct(
        private WorkoutExerciseService $workoutExerciseService
    ) {
    }

    public function store(Request $request, Workout $workout, WorkoutExerciseDTO $dto)
    {
        $this->workoutExerciseService->createWorkoutExercise($workout, $dto);

        return to_route('workout.show', ['workout' => $workout->id]);
    }

    public function delete(Request $request, Workout $workout, WorkoutExercise $workoutExercise )
    {
        $this->workoutExerciseService->delete($workoutExercise);

        return to_route('workout.show', ['workout' => $workout->id]);
    }

}
