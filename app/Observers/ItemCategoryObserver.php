<?php

namespace App\Observers;

use App\Models\ItemCategory;
use Illuminate\Support\Facades\Cache;

class ItemCategoryObserver
{
    /**
     * Handle the ItemCategory "created" event.
     */
    public function created(ItemCategory $itemCategory): void
    {
        Cache::forget('item_categories');
    }

    /**
     * Handle the ItemCategory "updated" event.
     */
    public function updated(ItemCategory $itemCategory): void
    {
        Cache::forget('item_categories');
    }

    /**
     * Handle the ItemCategory "deleted" event.
     */
    public function deleted(ItemCategory $itemCategory): void
    {
        Cache::forget('item_categories');
    }

    /**
     * Handle the ItemCategory "restored" event.
     */
    public function restored(ItemCategory $itemCategory): void
    {
        Cache::forget('item_categories');
    }

    /**
     * Handle the ItemCategory "force deleted" event.
     */
    public function forceDeleted(ItemCategory $itemCategory): void
    {
        Cache::forget('item_categories');
    }
}
