<?php

namespace App\Application\Workout\DTOs;

class WorkoutExerciseDTO
{

    public function __construct(
        public int $workoutId,
        public int $exerciseId,
        public int $repetitions,
        public int $sets,
        public float $weight
    )
    {

    }
}
