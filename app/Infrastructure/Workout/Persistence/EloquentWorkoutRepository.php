<?php

namespace App\Infrastructure\Workout\Persistence;

use App\Domain\Workout\Contracts\WorkoutRepositoryInterface;
use App\Domain\Workout\Models\Workout;

class EloquentWorkoutRepository implements WorkoutRepositoryInterface
{
    public function create(array $data): Workout
    {
        return Workout::create($data);
    }

    public function findById(int $id): ?Workout
    {
        return Workout::with('workoutExercises')->where("id", $id)->get();
    }

    public function findByUserId(int $userId)
    {
        return Workout::where('user_id', $userId)->with('workoutExercises')->get();
    }
}
