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

    public function findById(int $id): ?Exercise
    {
        return Exercise::with('exercises')->where("id", $id)->get();
    }

    public function findByUserId(int $userId): array
    {
        return Exercise::where('user_id', $userId)->with('exercises')->get()->toArray();
    }
}
