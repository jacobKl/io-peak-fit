<?php

namespace App\Domain\MonthSummary\Contracts;

interface MonthSummaryRepositoryInterface
{
    public function getWorkouts();
    public function getExercises();
}
