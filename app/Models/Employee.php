<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function InputVouchers(): HasMany
    {
        return $this->hasMany(InputVoucher::class);
    }
    public function HrDocument(): HasMany
    {
        return $this->hasMany(HrDocument::class);
    }

    public function Section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
    public function MoveSection(): BelongsTo
    {
        return $this->belongsTo(Section::class,"move_section_id","id");
    }
    public function EmployeeCenter(): BelongsTo
    {
        return $this->belongsTo(EmployeeCenter::class);
    }
    public function EmployeePosition(): BelongsTo
    {
        return $this->belongsTo(EmployeePosition::class);
    }
    public function EmployeeType(): BelongsTo
    {
        return $this->belongsTo(EmployeeType::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Vacation(): HasOne
    {
        return $this->hasOne(Vacation::class);
    }

    public function VacationDailies(): HasManyThrough
    {
        return $this->hasManyThrough(VacationDaily::class, Vacation::class);
    }

    public function VacationTimes(): HasManyThrough
    {
        return $this->hasManyThrough(VacationTime::class, Vacation::class);
    }

    public function VacationSicks(): HasManyThrough
    {
        return $this->hasManyThrough(VacationSick::class, Vacation::class);
    }

    public function OutputVouchers(): HasMany
    {
        return $this->hasMany(OutputVoucher::class);
    }
}
