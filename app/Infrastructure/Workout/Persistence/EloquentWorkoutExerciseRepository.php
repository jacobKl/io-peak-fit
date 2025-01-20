<?php

namespace App\Infrastructure\Workout\Persistence;

use App\Domain\Workout\Contracts\WorkoutExerciseRepositoryInterface;
use App\Domain\Workout\Models\WorkoutExercise;

class EloquentWorkoutExerciseRepository implements WorkoutExerciseRepositoryInterface
{
    public function create(array $data): WorkoutExercise
    {
        return WorkoutExercise::create($data);
    }

    public function findById(int $id): ?WorkoutExercise
    {
        return WorkoutExercise::with('workoutExercises')->where("id", $id)->get();
    }

    public function findByUserId(int $userId): array
    {
        return WorkoutExercise::where('user_id', $userId)->with('workoutExercises')->get()->toArray();
    }

    public function deleteByWorkoutId(int $workoutId): void
    {
        WorkoutExercise::where('workout_id', $workoutId)->delete();
    }

    public function delete(int $id): bool
    {
        $workoutExercise = WorkoutExercise::findOrFail($id);
        return $workoutExercise->delete();
    }

    public function edit(int $id, array $data): bool {
        $workoutExercise = WorkoutExercise::findOrFail($id);
        $workoutExercise->fill($data);
        
        return $workoutExercise->save();
    }
}
