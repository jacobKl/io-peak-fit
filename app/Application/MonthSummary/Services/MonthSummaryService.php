<?php

namespace App\Application\MonthSummary\Services;

use App\Domain\Workout\Models\WorkoutExercise;
use App\Infrastructure\MonthSummary\Persistence\EloquentMonthSummaryRepository;
use Illuminate\Database\Eloquent\Collection;

class MonthSummaryService {

    public function __construct(
        private EloquentMonthSummaryRepository $monthSummaryRepository
    )
    {

    }

    public function getAnalysis()
    {
        $workouts = $this->monthSummaryRepository->getWorkouts();
        $exercises = $this->monthSummaryRepository->getExercises();


        return [
            'workout_count' => $workouts->count(),
            ...$this->getExercisesData($exercises)
        ];
    }

    private function getExercisesData(Collection $exercises) {
        $totals = $exercises->reduce(
            fn ($acc, WorkoutExercise $exercise) => [
                'repetitions' => $acc['repetitions'] + $exercise->repetitions,
                'sets' => $acc['sets'] + $exercise->sets,
                'weight' => $acc['weight'] + $exercise->weight * $exercise->repetitions * $exercise->sets,
            ],
            ['repetitions' => 0, 'sets' => 0, 'weight' => 0]
        );

        return $totals;
    }
}
