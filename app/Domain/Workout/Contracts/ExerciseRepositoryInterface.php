<?php

namespace App\Domain\Workout\Contracts;

use App\Domain\Workout\Models\Exercise;

interface ExerciseRepositoryInterface
{
    public function create(array $data): Exercise;
    public function findById(int $id): ?Exercise;
    public function findByUserId(int $userId): array;
}
