<?php

namespace App\Interfaces\Http\Controllers;

use App\Interfaces\Http\Controllers\Controller;
use App\Application\Workout\DTOs\WorkoutDTO;
use App\Application\Workout\Services\WorkoutService;
use App\Domain\Workout\Models\Workout;
use App\Infrastructure\Workout\Persistence\EloquentExerciseRepository;
use Illuminate\View\View;

class WorkoutController extends Controller
{
    private WorkoutService $workoutService;
    private EloquentExerciseRepository $exerciseRepository;

    public function __construct(WorkoutService $workoutService, EloquentExerciseRepository $exerciseRepository)
    {
        $this->workoutService = $workoutService;
        $this->exerciseRepository = $exerciseRepository;
    }

    public function create()
    {
        $workouts = $this->workoutService->getUserWorkouts();
        // dd($workouts);
        return view('create-workout', ['workouts' => $workouts]);
    }

    public function store(WorkoutDTO $dto)
    {
        $workout = $this->workoutService->createWorkout($dto);

        return to_route('workout');
    }

    public function getWorkout(int $id)
    {
        $workout = $this->workoutService->getWorkout($id);

        return response()->json(['workout' => $workout]);
    }

    public function show(Workout $workout) {
        return view('workout', ['workout' => $workout, 'exercises' => $this->exerciseRepository->getAll()]);
    }
}
