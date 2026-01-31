<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Muscle;
use App\Models\MuscleGroup;
use Illuminate\Database\Seeder;

class MusclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Chest' => ['Upper Chest', 'Middle Chest', 'Lower Chest'],
            'Back' => ['Lats', 'Traps', 'Lower Back', 'Rhomboids'],
            'Legs' => ['Quads', 'Hamstrings', 'Calves', 'Glutes'],
            'Shoulders' => ['Front Delts', 'Side Delts', 'Rear Delts'],
            'Arms' => ['Biceps', 'Triceps', 'Forearms'],
            'Abs' => ['Upper Abs', 'Lower Abs', 'Obliques'],
        ];

        foreach ($data as $groupName => $muscles) {
            $group = MuscleGroup::create(['name' => $groupName]);

            foreach ($muscles as $muscleName) {
                Muscle::create([
                    'muscle_group_id' => $group->id,
                    'name' => $muscleName,
                ]);
            }
        }
    }
}
