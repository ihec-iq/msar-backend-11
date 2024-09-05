<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VacationDaily extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Vacation(): BelongsTo
    {
        return $this->belongsTo(Vacation::class);
    }

    public function EmployeeAlter(): BelongsTo
    {
        return $this->belongsTo(Employee::class, foreignKey: 'employee_alter_id', ownerKey: 'id');
    }

    public function Reason(): BelongsTo
    {
        return $this->belongsTo(VacationReason::class, 'vacation_reason_id', 'id');
    }
}
