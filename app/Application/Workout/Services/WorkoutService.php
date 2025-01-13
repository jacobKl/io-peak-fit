<?php

namespace App\Application\Workout\Services;

use App\Application\Workout\DTOs\WorkoutDTO;
use App\Domain\Workout\Contracts\WorkoutRepositoryInterface;
use App\Domain\Workout\Contracts\WorkoutExerciseRepositoryInterface;
use App\Domain\Workout\Models\Workout;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutExerciseRepository;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutRepository;

class WorkoutService
{
    private WorkoutRepositoryInterface $workoutRepository;
    private WorkoutExerciseRepositoryInterface $workoutExcerciseRepository;

    public function __construct(EloquentWorkoutRepository $workoutRepository, EloquentWorkoutExerciseRepository $excerciseRepository)
    {
        $this->workoutRepository = $workoutRepository;
        $this->workoutExcerciseRepository = $excerciseRepository;
    }

    public function createWorkout(WorkoutDTO $dto)
    {
        $workout = $this->workoutRepository->create([
            'user_id' => $dto->userId,
            'date' => $dto->date,
            'description' => $dto->description
        ]);

        foreach ($dto->exercises as $exercise) {
            $this->workoutExcerciseRepository->create([
                'workout_id' => $workout->id,
                ...$exercise
            ]);
        }

        return $workout;
    }

    public function getWorkout(int $id): ?Workout
    {
        return Workout::with('workoutExercises')->where('id', $id)->first();
    }
}
