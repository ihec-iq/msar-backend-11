<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InputVoucher extends Model
{
    use HasFactory;

    protected $guarded = [];

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
