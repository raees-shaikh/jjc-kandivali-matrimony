<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Console\Scheduling\Schedule;
use App\Events\SubscriptionExpiredReminderEvent;
use App\Events\SubscriptionExpiringReminderOneEvent;
use App\Events\SubscriptionExpiringReminderTwoEvent;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // Mark user subscription as inactive if expired
        $schedule->call(function () {
            $subscription = Subscription::whereIsActive(1)->where('end_date', '<', now())->get();
            foreach ($subscription as $sub) {
                $sub->update(['is_active' => 0]);
            }
        });

        // Notifying User that subscriptions is going to expire in 7 days
        $schedule->call(function () {
            $subscription = Subscription::whereIsActive(1)->whereDate('end_date', '=', Carbon::today()->addDays(7)->toDateString())->get();
            foreach ($subscription as $sub) {
                event(new SubscriptionExpiringReminderOneEvent($sub));
            }
        })->dailyAt('08:00');

        // Notifying User that subscriptions is going to expire in 3 days
        $schedule->call(function () {
            $subscription = Subscription::whereIsActive(1)->whereDate('end_date', '=', Carbon::today()->addDays(3)->toDateString())->get();
            foreach ($subscription as $sub) {
                event(new SubscriptionExpiringReminderTwoEvent($sub));
            }
        })->dailyAt('08:00');

        // Notifying User that subscriptions is expired
        $schedule->call(function () {
            $subscription = Subscription::whereDate('end_date', '=', Carbon::today()->subDays(1)->toDateString())->get();
            foreach ($subscription as $sub) {
                event(new SubscriptionExpiredReminderEvent($sub));
            }
        })->dailyAt('08:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
