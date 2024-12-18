<?php

namespace App\Application\Workout\Services;

use App\Application\Workout\DTOs\WorkoutDTO;
use App\Domain\Workout\Contracts\WorkoutRepositoryInterface;
use App\Domain\Workout\Contracts\ExerciseRepositoryInterface;
use App\Domain\Workout\Models\Exercise;
use App\Domain\Workout\Models\Workout;
use App\Infrastructure\Workout\Persistence\EloquentExerciseRepository;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutRepository;

class WorkoutService
{
    private WorkoutRepositoryInterface $workoutRepository;
    private ExerciseRepositoryInterface $excerciseRepository;

    public function __construct(EloquentWorkoutRepository $workoutRepository, EloquentExerciseRepository $excerciseRepository)
    {
        $this->workoutRepository = $workoutRepository;
        $this->excerciseRepository = $excerciseRepository;
    }

    public function createWorkout(WorkoutDTO $dto)
    {
        $workout = $this->workoutRepository->create([
            'user_id' => $dto->userId,
            'date' => $dto->date,
            'description' => $dto->description
        ]);

        foreach ($dto->exercises as $exercise) {
            $this->excerciseRepository->create([
                'workout_id' => $workout->id,
                ...$exercise
            ]);
        }

        return $workout;
    }

    public function getWorkout(int $id): ?Workout
    {
        return Workout::with('exercises')->where('id', $id)->first();
    }
}
