<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bonus extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }  
    public function DegreeStage(): BelongsTo
    {
        return $this->belongsTo(BonusDegreeStage::class,'bonus_degree_stage_id');
    }

}
