<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bonus extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }  
    public function DegreeStage(): BelongsTo
    {
        return $this->belongsTo(BonusDegreeStage::class,'degree_stage_id');
    }

}
