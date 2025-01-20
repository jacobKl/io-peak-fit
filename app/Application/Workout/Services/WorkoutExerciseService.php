<?php

namespace App\Application\Workout\Services;

use App\Application\Workout\DTOs\WorkoutExerciseDTO;
use App\Domain\Workout\Contracts\WorkoutExerciseRepositoryInterface;
use App\Domain\Workout\Models\Workout;
use App\Domain\Workout\Models\WorkoutExercise;
use App\Infrastructure\Workout\Persistence\EloquentWorkoutExerciseRepository;

class WorkoutExerciseService
{
    private WorkoutExerciseRepositoryInterface $workoutExerciseRepository;

    public function __construct(EloquentWorkoutExerciseRepository $workoutExerciseRepository)
    {
        $this->workoutExerciseRepository = $workoutExerciseRepository;
    }

    public function createWorkoutExercise(Workout $workout, WorkoutExerciseDTO $dto)
    {
        $workoutExercise = $this->workoutExerciseRepository->create([
            'workout_id' => $workout->id,
            'exercise_id'=> $dto->exerciseId,
            'repetitions'=> $dto->repetitions,
            'sets'=> $dto->sets,
            'weight'=> $dto->weight
        ]);

        return $workoutExercise;
    }

    public function deleteWorkoutExercises(Workout $workout): void
    {
        $this->workoutExerciseRepository->deleteByWorkoutId($workout->id);
    }

    public function delete(WorkoutExercise $workoutExercise)
    {
        $this->workoutExerciseRepository->delete($workoutExercise->id);
    }

    public function edit(int $workoutExerciseId, WorkoutExerciseDTO $dto)
    {
        $workoutExercise = $this->workoutExerciseRepository->edit(
            $workoutExerciseId,
            [
                'workout_id' => $dto->workoutId,
                'exercise_id' => $dto->exerciseId,
                'repetitions' => $dto->repetitions,
                'sets' => $dto->sets,
                'weight' => $dto->weight
            ]
        );

        return $workoutExercise;
    }
}
