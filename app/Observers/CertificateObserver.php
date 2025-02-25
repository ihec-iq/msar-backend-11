<?php

namespace App\Observers;

use App\Models\Certificate;
use Illuminate\Support\Facades\Cache;
class CertificateObserver
{
    /**
     * Handle the Certificate "created" event.
     */
    public function created(Certificate $certificate): void
    {
        Cache::forget('certificates');
    }

    /**
     * Handle the Certificate "updated" event.
     */
    public function updated(Certificate $certificate): void
    {
        Cache::forget('certificates');
    }

    /**
     * Handle the Certificate "deleted" event.
     */
    public function deleted(Certificate $certificate): void
    {
        Cache::forget('certificates');
    }

    /**
     * Handle the Certificate "restored" event.
     */
    public function restored(Certificate $certificate): void
    {
        Cache::forget('certificates');
    }

    /**
     * Handle the Certificate "force deleted" event.
     */
    public function forceDeleted(Certificate $certificate): void
    {
        Cache::forget('certificates');
    }
}
