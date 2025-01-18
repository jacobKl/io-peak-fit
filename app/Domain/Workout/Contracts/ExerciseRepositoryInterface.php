<?php

namespace App\Domain\Workout\Contracts;

use App\Domain\Workout\Models\Exercise;

interface ExerciseRepositoryInterface
{
    public function create(array $data): Exercise;
    public function getAll();
}
