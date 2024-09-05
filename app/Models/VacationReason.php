<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VacationReason extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function VacationDaily(): HasMany
    {
        return $this->hasMany(VacationDaily::class);
    }

    public function VacationTime(): HasMany
    {
        return $this->hasMany(VacationTime::class);
    }
}
