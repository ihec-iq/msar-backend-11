<?php

namespace App\Observers;

use App\Models\BonusDegreeStage;
use Illuminate\Support\Facades\Cache;

class BonusDegreeStageObserver
{
    /**
     * Handle the BonusDegreeStage "created" event.
     */
    public function created(BonusDegreeStage $bonusDegreeStage): void
    {
        Cache::forget('bonus_degree_stages');
    }

    /**
     * Handle the BonusDegreeStage "updated" event.
     */
    public function updated(BonusDegreeStage $bonusDegreeStage): void
    {
        Cache::forget('bonus_degree_stages');
    }

    /**
     * Handle the BonusDegreeStage "deleted" event.
     */
    public function deleted(BonusDegreeStage $bonusDegreeStage): void
    {
        Cache::forget('bonus_degree_stages');
    }

    /**
     * Handle the BonusDegreeStage "restored" event.
     */
    public function restored(BonusDegreeStage $bonusDegreeStage): void
    {
        Cache::forget('bonus_degree_stages');
    }

    /**
     * Handle the BonusDegreeStage "force deleted" event.
     */
    public function forceDeleted(BonusDegreeStage $bonusDegreeStage): void
    {
        Cache::forget('bonus_degree_stages');
    }
}
