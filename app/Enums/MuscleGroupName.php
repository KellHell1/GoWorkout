<?php

declare(strict_types=1);

namespace App\Enums;

enum MuscleGroupName: string
{
    case ARMS = 'Arms';
    case CHEST = 'Chest';
    case BACK = 'Back';
    case LEGS = 'Legs';
    case OTHER = 'Other';
}
