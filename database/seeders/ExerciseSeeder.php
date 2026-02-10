<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\ExerciseName;
use App\Models\Exercise;
use App\Models\Muscle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ExerciseName::cases() as $exEnum) {
            $exercise = Exercise::updateOrCreate(
                ['name' => $exEnum->value],
                ['description' => $exEnum->description()]
            );

            $musclesToAttach = [];

            foreach ($exEnum->muscles() as $muscleName => $isPrimary) {
                $muscle = Muscle::where('name', $muscleName)->first();

                if ($muscle) {
                    $musclesToAttach[$muscle->id] = [
                        'id' => Str::uuid()->toString(),
                        'is_primary' => $isPrimary,
                    ];
                }
            }

            $exercise->muscles()->sync($musclesToAttach);
        }
    }
}
