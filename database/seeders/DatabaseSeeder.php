<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Uid\Uuid;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => Uuid::v4(),
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            ExerciseSeeder::class,
            MusclesSeeder::class,
            WorkoutSeeder::class,
        ]);
    }
}
