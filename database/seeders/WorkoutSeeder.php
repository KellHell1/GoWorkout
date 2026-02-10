<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\ExerciseName;
use App\Models\Exercise;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            return;
        }

        $this->createWorkout($user, 'Chest and Triceps', [
            ExerciseName::BENCH_PRESS->value => [
                ['reps' => 12, 'weight' => 50],
                ['reps' => 10, 'weight' => 60],
                ['reps' => 8, 'weight' => 70],
            ],
        ]);

        $this->createWorkout($user, 'Legs and Back (Base)', [
            ExerciseName::SQUAT->value => [
                ['reps' => 10, 'weight' => 60],
                ['reps' => 10, 'weight' => 80],
                ['reps' => 8, 'weight' => 100],
            ],
            ExerciseName::PULL_UPS->value => [
                ['reps' => 10, 'weight' => 0],
                ['reps' => 8, 'weight' => 0],
            ],
        ]);
    }

    private function createWorkout(User $user, string $name, array $exercisesWithSets): void
    {
        $workout = Workout::create([
            'user_id' => $user->id,
            'name' => $name,
            'created_at' => now()->subDays(rand(1, 10)),
        ]);

        $order = 1;
        foreach ($exercisesWithSets as $exerciseName => $sets) {
            $exercise = Exercise::where('name', $exerciseName)->first();

            if ($exercise) {
                $workoutEx = $workout->workoutExercises()->create([
                    'exercise_id' => $exercise->id,
                    'sort_order' => $order++,
                ]);

                foreach ($sets as $setData) {
                    $workoutEx->sets()->create(array_merge($setData, ['is_completed' => true]));
                }
            }
        }
    }
}
