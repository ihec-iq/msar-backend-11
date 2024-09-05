<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VacationTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Vacation(): BelongsTo
    {
        return $this->belongsTo(Vacation::class);
    }

    public function Reason(): BelongsTo
    {
        return $this->belongsTo(VacationReason::class, 'vacation_reason_id', 'id');
    }
}
