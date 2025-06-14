<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SubscriptionExpiredReminderOneMail;
use App\Events\SubscriptionExpiringReminderOneEvent;

class SubscriptionExpiringReminderOneListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SubscriptionExpiringReminderOneEvent  $event
     * @return void
     */
    public function handle(SubscriptionExpiringReminderOneEvent $event)
    {
        $sub = $event->sub;
        $user = $sub->user;
        //dd($user);
        if ($user->email) {
            Mail::to($user->email)->send(new SubscriptionExpiredReminderOneMail());
        }
        if ($user->mobile) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_subscription_reminder_one_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $user->mobile,
                "NAME" => str_limit($user->full_name, 27),
            ]);
            // dd($res);
        }
    }
}
