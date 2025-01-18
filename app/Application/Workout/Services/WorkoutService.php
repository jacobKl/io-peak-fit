<?php

namespace App\Application\Workout\Services;

use App\Application\Workout\DTOs\WorkoutDTO;
use App\Domain\Workout\Contracts\WorkoutRepositoryInterface;
use App\Domain\Workout\Models\Workout;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutRepository;

class WorkoutService
{
    private WorkoutRepositoryInterface $workoutRepository;

    public function __construct(EloquentWorkoutRepository $workoutRepository)
    {
        $this->workoutRepository = $workoutRepository;
    }

    public function createWorkout(WorkoutDTO $dto)
    {
        $workout = $this->workoutRepository->create([
            'user_id' => $dto->userId,
            'date' => $dto->date,
            'description' => $dto->description
        ]);

        return $workout;
    }

    public function getWorkout(int $id): ?Workout
    {
        return Workout::with('workoutExercises')->where('id', $id)->first();
    }

    public function getUserWorkouts()
    {
        return $this->workoutRepository->findByUserId(1);
    }
}
