<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciseMuscle extends Pivot
{
    use HasUuids;

    public $timestamps = false;
}
