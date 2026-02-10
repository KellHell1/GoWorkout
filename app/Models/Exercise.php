<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exercise extends Model
{
    use HasUuids;

    public $timestamps = false;

    public function muscles(): BelongsToMany
    {
        return $this->belongsToMany(Muscle::class)
            ->withPivot('id', 'is_primary');
    }
}
