<?php

namespace App\Observers;

use App\Models\Study;
use Illuminate\Support\Facades\Cache;
class StudyObserver
{
    /**
     * Handle the Study "created" event.
     */
    public function created(Study $study): void
    {
        Cache::forget('studies');
    }

    /**
     * Handle the Study "updated" event.
     */
    public function updated(Study $study): void
    {
        Cache::forget('studies');
    }

    /**
     * Handle the Study "deleted" event.
     */
    public function deleted(Study $study): void
    {
        Cache::forget('studies');
    }

    /**
     * Handle the Study "restored" event.
     */
    public function restored(Study $study): void
    {
        Cache::forget('studies');
    }

    /**
     * Handle the Study "force deleted" event.
     */
    public function forceDeleted(Study $study): void
    {
        Cache::forget('studies');
    }
}
