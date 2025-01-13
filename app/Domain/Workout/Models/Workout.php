<?php

namespace App\Domain\Workout\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['user_id', 'date', 'description'];

    public function workoutExercises()
    {
        return $this->hasMany(WorkoutExercise::class);
    }
}
