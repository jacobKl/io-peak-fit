<?php

namespace App\Domain\Workout\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorkoutExercise extends Model
{
    protected $fillable = ['workout_id', 'exercise_id', 'repetitions', 'sets', 'weight'];

    public function exercise(): HasOne
    {
        return $this->hasOne(Exercise::class, 'id', 'exercise_id');
    }
}
