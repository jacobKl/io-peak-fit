<?php

namespace App\Domain\Workout\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['user_id', 'date', 'description'];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
