<?php

namespace App\Providers;

use App\Models\RetrievalVoucherItem;
use App\Models\InputVoucherItem;
use App\Models\OutputVoucherItem;
use App\Observers\RetrievalVoucherItemObserver;
use App\Observers\InputVoucherItemObserver;
use App\Observers\OutputVoucherItemObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        InputVoucherItem::class => [InputVoucherItemObserver::class],
        OutputVoucherItem::class => [OutputVoucherItemObserver::class],
        RetrievalVoucherItem::class => [RetrievalVoucherItemObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
        //InputVoucher::observe(InputVoucherObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
