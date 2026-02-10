<?php

declare(strict_types=1);

namespace App\Enums;

enum MuscleName: string
{
    // Chest
    case UPPER_CHEST = 'Upper Chest';
    case MIDDLE_CHEST = 'Middle Chest';
    case LOWER_CHEST = 'Lower Chest';

    // Back
    case LATS = 'Lats';
    case TRAPS = 'Traps';
    case LOWER_BACK = 'Lower Back';
    case RHOMBOIDS = 'Rhomboids';

    // Legs
    case QUADS = 'Quads';
    case HAMSTRINGS = 'Hamstrings';
    case CALVES = 'Calves';
    case GLUTES = 'Glutes';

    // Shoulders
    case FRONT_DELTS = 'Front Delts';
    case SIDE_DELTS = 'Side Delts';
    case REAR_DELTS = 'Rear Delts';

    // Arms
    case BICEPS = 'Biceps';
    case TRICEPS = 'Triceps';
    case FOREARMS = 'Forearms';

    public function group(): MuscleGroupName
    {
        return match ($this) {
            self::UPPER_CHEST => MuscleGroupName::CHEST,
            self::LATS, self::TRAPS, self::LOWER_BACK, self::RHOMBOIDS => MuscleGroupName::BACK,
            self::QUADS, self::HAMSTRINGS, self::CALVES, self::GLUTES => MuscleGroupName::LEGS,
            self::BICEPS, self::TRICEPS, self::FOREARMS => MuscleGroupName::ARMS,
            default => MuscleGroupName::OTHER,
        };
    }
}
