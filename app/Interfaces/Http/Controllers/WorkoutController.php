<?php

namespace App\Interfaces\Http\Controllers;

use App\Interfaces\Http\Controllers\Controller;
use App\Application\Workout\DTOs\WorkoutDTO;
use App\Application\Workout\Services\WorkoutService;
use App\Domain\Workout\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    private WorkoutService $workoutService;

    public function __construct(WorkoutService $workoutService)
    {
        $this->workoutService = $workoutService;
    }

    public function create() {
        return view('create-workout');
    }

    public function store(WorkoutDTO $dto)
    {
        $workout = $this->workoutService->createWorkout($dto);

        return response()->json(['workout' => $workout]);
    }

    public function getWorkout(int $id)
    {
        $workout = $this->workoutService->getWorkout($id);

        return response()->json(['workout' => $workout]);
    }
}
