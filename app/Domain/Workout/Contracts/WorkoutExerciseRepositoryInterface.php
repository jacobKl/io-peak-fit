<?php

namespace App\Domain\Workout\Contracts;

use App\Domain\Workout\Models\WorkoutExercise;

interface WorkoutExerciseRepositoryInterface
{
    public function create(array $data): WorkoutExercise;
    public function findById(int $id): ?WorkoutExercise;
    public function findByUserId(int $userId): array;

    public function deleteByWorkoutId(int $workoutId): void;
    public function delete(int $id): bool;
    public function edit(int $id, array $data): bool;
}
