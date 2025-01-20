<?php

namespace App\Providers;

use App\Application\Workout\DTOs\WorkoutDTO;
use App\Application\Workout\DTOs\WorkoutExerciseDTO;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class WorkoutExerciseDTOServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(WorkoutExerciseDTO::class, function ($app) {
            $request = $app->make(Request::class);

            return new WorkoutExerciseDTO(
                $request->input('workout_id'),
                $request->input('exercise_id'),
                $request->input('repetitions'),
                $request->input('sets'),
                $request->input('weight'),
            );
        });
    }
}
