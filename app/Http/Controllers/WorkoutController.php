<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Workout;
use Inertia\Inertia;
use Inertia\Response;

class WorkoutController extends Controller
{
    public function index(): Response
    {
        $workouts = Workout::where('user_id', auth()->id())
            ->withCount('workoutExercises')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Workouts/Index', [
            'workouts' => $workouts,
        ]);
    }

    public function show(string $id): Response
    {
        $workout = Workout::with([
            'workoutExercises' => function ($query) {
                $query->orderBy('sort_order', 'asc');
            },
            'workoutExercises.exercise',
            'workoutExercises.sets',
        ])->findOrFail($id);

        return Inertia::render('Workouts/Show', [
            'workout' => $workout,
        ]);
    }
}
