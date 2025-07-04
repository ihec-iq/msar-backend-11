<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class InputVoucher extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function Items(): HasMany
    {
        return $this->hasMany(InputVoucherItem::class)->orderBy('id', 'desc');
    }

    public function Employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function State(): BelongsTo
    {
        return $this->belongsTo(InputVoucherState::class, 'input_voucher_state_id', 'id');
    }
    public function Stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }
}
