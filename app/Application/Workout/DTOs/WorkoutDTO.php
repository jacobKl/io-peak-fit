<?php

namespace App\Application\Workout\DTOs;

class WorkoutDTO
{
    public int $userId;
    public string $date;
    public string $description;

    public function __construct(int $userId, string $date, string $description)
    {
        $this->userId = $userId;
        $this->date = $date;
        $this->description = $description;
    }
}
