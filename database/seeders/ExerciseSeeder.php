<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\{Exercise, Muscle};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            [
                'name' => 'Bench Press',
                'description' => 'A classic compound exercise for chest and triceps.',
                'muscles' => [
                    'Middle Chest' => true,
                    'Triceps' => false,
                    'Front Delts' => false,
                ],
            ],
            [
                'name' => 'Pull-ups',
                'description' => 'Great exercise for back width and biceps.',
                'muscles' => [
                    'Lats' => true,
                    'Biceps' => false,
                    'Rear Delts' => false,
                ],
            ],
            [
                'name' => 'Squats',
                'description' => 'The king of leg exercises.',
                'muscles' => [
                    'Quads' => true,
                    'Glutes' => true,
                    'Lower Back' => false,
                ],
            ],
        ];

        foreach ($exercises as $exData) {
            $exercise = Exercise::create([
                'name' => $exData['name'],
                'description' => $exData['description'],
            ]);

            foreach ($exData['muscles'] as $muscleName => $isPrimary) {
                $muscle = Muscle::where('name', $muscleName)->first();

                if ($muscle) {
                    $exercise->muscles()->attach($muscle->id, [
                        'id' => Str::uuid(),
                        'is_primary' => $isPrimary,
                    ]);
                }
            }
        }
    }
}
