<?php

namespace App\Application\Workout\DTOs;

class WorkoutDTO
{
    public int $userId;
    public string $date;
    public string $description;
    public array $exercises;

    public function __construct(int $userId, string $date, string $description, array $exercises)
    {
        $this->userId = $userId;
        $this->date = $date;
        $this->description = $description;
        $this->exercises = $exercises;
    }
}
