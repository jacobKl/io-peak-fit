<?php

namespace App\Domain\Workout\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['workout_id', 'name', 'repetitions', 'sets', 'weight'];
}
