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
    public function JobTitle(): BelongsTo
    {
        return $this->belongsTo(BonusJobTitle::class,'bonus_job_title_id');
    }
    public function Study(): BelongsTo
    {
        return $this->belongsTo(BonusStudy::class,'bonus_study_id');
    }
    public function DegreeStage(): BelongsTo
    {
        return $this->belongsTo(BonusDegreeStage::class,'bonus_degree_stage_id');
    }

}
