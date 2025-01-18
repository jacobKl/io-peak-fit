<?php

namespace App\Infrastructure\MonthSummary\Persistence;

use App\Domain\MonthSummary\Contracts\MonthSummaryRepositoryInterface;
use App\Domain\Workout\Models\Workout;
use App\Domain\Workout\Models\WorkoutExercise;
use Carbon\Carbon;

class EloquentMonthSummaryRepository implements MonthSummaryRepositoryInterface
{
    public function getWorkouts() {
        return Workout::where('user_id', 1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();
    }

    public function getExercises()
    {
        $workoutsId = Workout::where('user_id', 1)->get('id');

        return WorkoutExercise::whereIn('workout_id', $workoutsId)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();
    }
}
