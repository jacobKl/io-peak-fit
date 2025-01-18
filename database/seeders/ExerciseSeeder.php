<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domain\Workout\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exercise::create([
            'name' => 'Squat',
            'description' => 'A compound exercise targeting the legs and glutes.'
        ]);

        Exercise::create([
            'name' => 'Deadlift',
            'description' => 'A powerful lift engaging the back, glutes, and hamstrings.'
        ]);

        Exercise::create([
            'name' => 'Pull-up',
            'description' => 'An upper body exercise focusing on the lats and biceps.'
        ]);

        Exercise::create([
            'name' => 'Push-up',
            'description' => 'A bodyweight exercise for chest, shoulders, and triceps.'
        ]);

        Exercise::create([
            'name' => 'Overhead Press',
            'description' => 'A shoulder exercise pressing weight overhead.'
        ]);

        Exercise::create([
            'name' => 'Lunges',
            'description' => 'A lower body exercise targeting quads, hamstrings, and glutes.'
        ]);

        Exercise::create([
            'name' => 'Barbell Row',
            'description' => 'A compound back exercise to build strength and mass.'
        ]);

        Exercise::create([
            'name' => 'Plank',
            'description' => 'A core stability exercise engaging abs and back.'
        ]);

        Exercise::create([
            'name' => 'Dumbbell Bicep Curl',
            'description' => 'An isolation exercise for building bicep muscles.'
        ]);

        Exercise::create([
            'name' => 'Tricep Dips',
            'description' => 'An exercise targeting triceps, shoulders, and chest.'
        ]);
    }
}
