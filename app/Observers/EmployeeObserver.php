<?php

namespace App\Observers;

use App\Models\Employee;
use Illuminate\Support\Facades\Cache;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
        Cache::forget('employees');
        Cache::forget('employees_lite');
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        Cache::forget('employees');
        Cache::forget('employees_lite');
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        Cache::forget('employees');
        Cache::forget('employees_lite');
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        Cache::forget('employees');
        Cache::forget('employees_lite');
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        Cache::forget('employees');
        Cache::forget('employees_lite');
    }
}
