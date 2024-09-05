<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VacationSick extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Vacation(): BelongsTo
    {
        return $this->belongsTo(Vacation::class);
    }
}
