<?php

namespace App\Observers;

use App\Models\ArchiveType;
use Illuminate\Support\Facades\Cache;

class ArchiveTypeObserver
{
    protected $cacheKey = 'archive_types';
    /**
     * Handle the ArchiveType "created" event.
     */
    public function created(ArchiveType $archiveType): void
    {
        Cache::forget('archive_types');
    }

    /**
     * Handle the ArchiveType "updated" event.
     */
    public function updated(ArchiveType $archiveType): void
    {
        Cache::forget('archive_types');
    }

    /**
     * Handle the ArchiveType "deleted" event.
     */
    public function deleted(ArchiveType $archiveType): void
    {
        Cache::forget('archive_types');
    }

    /**
     * Handle the ArchiveType "restored" event.
     */
    public function restored(ArchiveType $archiveType): void
    {
        Cache::forget('archive_types');
    }

    /**
     * Handle the ArchiveType "force deleted" event.
     */
    public function forceDeleted(ArchiveType $archiveType): void
    {
        Cache::forget('archive_types');
    }
}
