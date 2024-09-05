<?php

namespace App\Observers;

use App\Models\RetrievalVoucherItem;
use App\Models\VoucherItemHistory;

class RetrievalVoucherItemObserver
{
    /**
     * Handle the RetrievalVoucherItem "created" event.
     */
    public function created(RetrievalVoucherItem $retrievalVoucherItem): void
    {
        VoucherItemHistory::create([
            //'input_voucher_item_id' => $retrievalVoucherItem->input_voucher_item_id,
            'input_voucher_item_id' => $retrievalVoucherItem->input_voucher_item_id,
            'item_id' => $retrievalVoucherItem->item_id,
            'voucher_item_historiable_id' => $retrievalVoucherItem->id,
            'voucher_item_historiable_type' => RetrievalVoucherItem::class,
            'employee_id' => $retrievalVoucherItem->employee_id,
            'price' => $retrievalVoucherItem->price,
            'count' => $retrievalVoucherItem->count,
            'notes' => $retrievalVoucherItem->notes,
        ]);
    }

    /**
     * Handle the RetrievalVoucherItem "updated" event.
     */
    public function updated(RetrievalVoucherItem $retrievalVoucherItem): void
    {
        //
    }

    /**
     * Handle the RetrievalVoucherItem "deleted" event.
     */
    public function deleted(RetrievalVoucherItem $retrievalVoucherItem): void
    {
        //
    }

    /**
     * Handle the RetrievalVoucherItem "restored" event.
     */
    public function restored(RetrievalVoucherItem $retrievalVoucherItem): void
    {
        //
    }

    /**
     * Handle the RetrievalVoucherItem "force deleted" event.
     */
    public function forceDeleted(RetrievalVoucherItem $retrievalVoucherItem): void
    {
        //
    }
}
