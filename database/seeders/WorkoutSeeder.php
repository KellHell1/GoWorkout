<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\{Exercise, User, Workout};
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        if (! $user) {
            return;
        }

        $workout = Workout::create([
            'user_id' => $user->id,
            'name' => 'First Full Body Session',
        ]);

        $benchPress = Exercise::where('name', 'Bench Press')->first();

        if ($benchPress) {
            $workoutEx = $workout->workoutExercises()->create([
                'exercise_id' => $benchPress->id,
                'sort_order' => 1,
            ]);

            $workoutEx->sets()->createMany([
                ['reps' => 10, 'weight' => 60, 'is_completed' => true],
                ['reps' => 8, 'weight' => 70, 'is_completed' => true],
            ]);
        }
    }
}
