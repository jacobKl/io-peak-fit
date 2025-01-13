<?php

namespace App\Domain\Workout\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutExercise extends Model
{
    protected $fillable = ['workout_id', 'name', 'repetitions', 'sets', 'weight'];
}
