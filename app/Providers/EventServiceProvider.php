<?php

namespace App\Providers;

use App\Events\ProfileApprovedEvent;
use App\Events\ProfileRejectedEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Http\Middleware\ProfileApproved;
use App\Listeners\ProfileApprovedListener;
use App\Listeners\ProfileRejectedListener;
use App\Events\SendNotificationToOldUserEvent;
use App\Events\SubscriptionExpiredReminderEvent;
use App\Events\SubscriptionExpiringReminderOneEvent;
use App\Events\SubscriptionExpiringReminderTwoEvent;
use App\Listeners\SendNotificationToOldUserListener;
use App\Listeners\SubscriptionExpiredReminderListener;
use App\Listeners\SubscriptionExpiringReminderOneListener;
use App\Listeners\SubscriptionExpiringReminderTwoListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProfileApprovedEvent::class => [
            ProfileApprovedListener::class,
        ],
        SubscriptionExpiringReminderOneEvent::class => [
            SubscriptionExpiringReminderOneListener::class,
        ],
        SubscriptionExpiringReminderTwoEvent::class => [
            SubscriptionExpiringReminderTwoListener::class,
        ],
        SubscriptionExpiredReminderEvent::class => [
            SubscriptionExpiredReminderListener::class,
        ],
        ProfileRejectedEvent::class => [
            ProfileRejectedListener::class,
        ],
        SendNotificationToOldUserEvent::class => [
            SendNotificationToOldUserListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
