<?php

namespace App\Domain\Workout\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        "name",
        "description"
    ];
}
