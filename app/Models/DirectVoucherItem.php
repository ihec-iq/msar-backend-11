<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DirectVoucherItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Voucher(): BelongsTo
    {
        return $this->belongsTo(DirectVoucher::class, 'direct_voucher_id', 'id');
    }
    public function Item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function Histories(): MorphMany
    {
        return $this->morphMany(VoucherItemHistory::class, 'voucher_item_historiable');
    }
}
