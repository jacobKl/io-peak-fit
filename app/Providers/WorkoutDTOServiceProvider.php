<?php

namespace App\Providers;

use App\Application\Workout\DTOs\WorkoutDTO;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class WorkoutDTOServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(WorkoutDTO::class, function ($app) {
            $request = $app->make(Request::class);

            return new WorkoutDTO(
                $request->input('userId'),
                $request->input('date'),
                $request->input('description'),
            );
        });
    }
}
