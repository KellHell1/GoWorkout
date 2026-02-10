<?php

declare(strict_types=1);

namespace App\Enums;

enum ExerciseName: string
{
    case BENCH_PRESS = 'Bench Press';
    case SQUAT = 'Squat';
    case DEADLIFT = 'Deadlift';
    case PULL_UPS = 'Pull Ups';

    public function category(): string
    {
        return match ($this) {
            self::BENCH_PRESS => 'Chest',
            self::SQUAT => 'Legs',
            self::DEADLIFT => 'Back',
            self::PULL_UPS => 'Back',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::BENCH_PRESS => 'A compound exercise that involves lifting a barbell while lying on a bench.',
            self::SQUAT => 'A full body compound exercise that primarily trains the muscles of the thighs and hips.',
            self::DEADLIFT => 'A weight training exercise in which a loaded barbell is lifted off the ground to the level of the hips.',
            self::PULL_UPS => 'An upper-body strength exercise where you lift your own body weight while hanging from a bar.',
        };
    }

    public function muscles(): array
    {
        return match ($this) {
            self::BENCH_PRESS => [
                MuscleName::MIDDLE_CHEST->value => true,
                MuscleName::TRICEPS->value => false,
                MuscleName::FRONT_DELTS->value => false,
            ],
            self::SQUAT => [
                MuscleName::QUADS->value => true,
                MuscleName::GLUTES->value => true,
                MuscleName::LOWER_BACK->value => false,
            ],
            self::DEADLIFT => [
                MuscleName::LOWER_BACK->value => true,
                MuscleName::HAMSTRINGS->value => true,
                MuscleName::LATS->value => false,
            ],
            self::PULL_UPS => [
                MuscleName::LATS->value => true,
                MuscleName::RHOMBOIDS->value => false,
                MuscleName::BICEPS->value => false,
            ],
        };
    }
}
