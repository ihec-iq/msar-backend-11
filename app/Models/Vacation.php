<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function VacationDaily(): HasMany
    {
        return $this->hasMany(VacationDaily::class);
    }

    public function VacationTime(): HasMany
    {
        return $this->hasMany(VacationTime::class);
    }

    public function VacationSick(): HasMany
    {
        return $this->hasMany(VacationSick::class);
    }
}
