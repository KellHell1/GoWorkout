<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MuscleGroup extends Model
{
    use HasUuids;

    public $timestamps = false;

    public function muscles(): HasMany
    {
        return $this->hasMany(Muscle::class);
    }
}
