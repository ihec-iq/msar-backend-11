<?php

namespace App\Observers;

use App\Models\InputVoucher;
use Illuminate\Support\Facades\Log;

class InputVoucherObserver
{
    /**
     * Handle the InputVoucher "created" event.
     */
    public function created(InputVoucher $inputVoucher): void
    {
        Log::alert('Observer InputVoucher');
        Log::alert($inputVoucher);
    }

    /**
     * Handle the InputVoucher "updated" event.
     */
    public function updated(InputVoucher $inputVoucher): void
    {
        //
    }

    /**
     * Handle the InputVoucher "deleted" event.
     */
    public function deleted(InputVoucher $inputVoucher): void
    {
        //
    }

    /**
     * Handle the InputVoucher "restored" event.
     */
    public function restored(InputVoucher $inputVoucher): void
    {
        //
    }

    /**
     * Handle the InputVoucher "force deleted" event.
     */
    public function forceDeleted(InputVoucher $inputVoucher): void
    {
        //
    }
}
