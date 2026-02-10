<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\MuscleGroupName;
use App\Enums\MuscleName;
use App\Models\Muscle;
use App\Models\MuscleGroup;
use Illuminate\Database\Seeder;

class MusclesSeeder extends Seeder
{
    public function run(): void
    {
        $groupsMap = [];
        foreach (MuscleGroupName::cases() as $groupEnum) {
            $group = MuscleGroup::firstOrCreate([
                'name' => $groupEnum->value,
            ]);

            $groupsMap[$groupEnum->value] = $group->id;
        }

        foreach (MuscleName::cases() as $muscleCase) {
            $groupNameForThisMuscle = $muscleCase->group()->value;

            if (isset($groupsMap[$groupNameForThisMuscle])) {
                Muscle::firstOrCreate(
                    ['name' => $muscleCase->value],
                    [
                        'muscle_group_id' => $groupsMap[$groupNameForThisMuscle],
                    ]
                );
            } else {
                $this->command->warn("Group '{$groupNameForThisMuscle}' not found for muscle {$muscleCase->value}");
            }
        }
    }
}
