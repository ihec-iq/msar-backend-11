<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bonuses extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
    public function JobTitle(): BelongsTo
    {
        return $this->belongsTo(BonusJobTitle::class);
    }
    public function Study(): BelongsTo
    {
        return $this->belongsTo(BonusStudy::class);
    }
    public function DigreeStage(): BelongsTo
    {
        return $this->belongsTo(BonusDigreeStage::class);
    }

}
