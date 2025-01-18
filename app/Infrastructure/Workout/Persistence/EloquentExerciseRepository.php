<?php

namespace App\Infrastructure\Workout\Persistence;

use App\Domain\Workout\Contracts\ExerciseRepositoryInterface;
use App\Domain\Workout\Models\Exercise;

class EloquentExerciseRepository implements ExerciseRepositoryInterface
{
    public function create(array $data): Exercise
    {
        return Exercise::create($data);
    }

    public function getAll() {
        return Exercise::all();
    }    
}
