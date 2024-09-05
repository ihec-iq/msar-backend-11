<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DirectVoucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Items(): HasMany
    {
        return $this->hasMany(DirectVoucherItem::class)->orderBy('id', 'desc');
    }

    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
