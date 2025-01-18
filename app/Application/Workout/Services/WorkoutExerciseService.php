<?php

namespace App\Application\Workout\Services;

use App\Application\Workout\DTOs\WorkoutExerciseDTO;
use App\Domain\Workout\Contracts\WorkoutExerciseRepositoryInterface;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutExerciseRepository;

class WorkoutExerciseService
{
    private WorkoutExerciseRepositoryInterface $workoutExerciseRepository;

    public function __construct(EloquentWorkoutExerciseRepository $workoutExerciseRepository)
    {
        $this->workoutExerciseRepository = $workoutExerciseRepository;
    }

    public function createWorkoutExercise(WorkoutExerciseDTO $dto)
    {
        dd($dto);

        $workout = $this->workoutExerciseRepository->create([

        ]);

        return $workout;
    }
}
