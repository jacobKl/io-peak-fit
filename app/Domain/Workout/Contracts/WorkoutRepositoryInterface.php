<?php

namespace App\Domain\Workout\Contracts;

use App\Domain\Workout\Models\Workout;

interface WorkoutRepositoryInterface
{
    public function create(array $data): Workout;
    public function findById(int $id): ?Workout;
    public function findByUserId(int $userId);
}
