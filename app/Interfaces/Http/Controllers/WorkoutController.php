<?php

namespace App\Interfaces\Http\Controllers;

use App\Interfaces\Http\Controllers\Controller;
use App\Application\Workout\DTOs\WorkoutDTO;
use App\Application\Workout\Services\WorkoutService;
use App\Domain\Workout\Models\Workout;
use App\Infrastructure\Workout\Persistence\EloquentExerciseRepository;
use Illuminate\Http\Request;

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
        return view('create-workout', ['workouts' => $workouts]);
    }

    public function store(WorkoutDTO $dto)
    {
        $this->workoutService->createWorkout($dto);

        return to_route('workout');
    }

    public function getWorkout(int $id)
    {
        $workout = $this->workoutService->getWorkout($id);

        return response()->json(['workout' => $workout]);
    }

    public function show(Request $request)
    {
        $workoutId = $request->route('workout');

        $workout = Workout::with(['workoutExercises.exercise'])->where('id', $workoutId)->firstOrFail();

        return view('workout', ['workout' => $workout, 'exercises' => $this->exerciseRepository->getAll()]);
    }
}
