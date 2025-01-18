<?php

namespace App\Application\Workout\Services;

use App\Application\Workout\DTOs\WorkoutDTO;
use App\Domain\Workout\Contracts\WorkoutExerciseRepositoryInterface;
use App\Domain\Workout\Models\Workout;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutRepository;

class WorkoutExerciseService
{
    private WorkoutExerciseRepositoryInterface $workoutExerciseRepository;

    public function __construct(EloquentExerciseWorkoutRepository $workoutExerciseRepository)
    {
        $this->workoutExerciseRepository = $workoutExerciseRepository;
    }

    public function createWorkoutExercise(WorkoutExerciseDTO $dto)
    {
        $workout = $this->workoutExerciseRepository->create([
            'user_id' => $dto->userId,
            'date' => $dto->date,
            'description' => $dto->description
        ]);

        return $workout;
    }
}